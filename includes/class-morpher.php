<?php
require_once(plugin_dir_path(__FILE__).'/classes/modula/class-modulaimage.php');
require_once(plugin_dir_path(__FILE__).'/classes/modula/class-modulasettings.php');
include_once(plugin_dir_path(__FILE__).'/functions-custom.php');

class Morpher {
    private $devMode = true;
    private $wpdb;
    private $url;
    private $imgDirs = ["ngg" => "gallery/temp"];
    private $authorizedExtensions = ["jpg", "jpeg", "png"];

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->url = home_url();
    }

    public function nggToModula() {
        try {
            $ngg_pictures = $this->getTableContent("ngg_pictures");
            $ngg_galleries = $this->getTableContent("ngg_gallery");

            foreach ($ngg_pictures as $picture) {
                $index = $this->arraySearchForId($ngg_galleries, $picture["galleryid"]);
                if ($index !== -1) {
                    $ngg_galleries[$index]['pictures'][] = $picture;
                }
            }

            $files = $this->nggMoveFiles();
            $files = $this->saveFiles($files); // [["id"=>1, "filename"=>"/var/.../image.jpg"]]

            $post_data_base = [
                "post_title"    => '',
                "post_name"     => '',
				'post_type'     => 'modula-gallery',
				'post_status'   => 'publish',
            ];
            $newGalleries = [];
            $modulaSettings = new ModulaSettings();
            foreach ($ngg_galleries as $oldGallery) {
                $post_data = $post_data_base;
                $title = explode("-", $oldGallery['title']);
                $title[0] = ucfirst($title[0]);
                $post_data['post_title'] = implode(' ', $title);
                $post_data['name'] = $oldGallery['name'];

                $gallery_id = wp_insert_post( $post_data );
                
			    add_post_meta( $gallery_id, 'modula-settings', $modulaSettings->get(), true );
                
                $img_tab = $oldGallery['pictures'];

                foreach ($img_tab as $base_img) {
                    $base_filename = basename($base_img['filename']);
                    $base_alt = basename($base_img['alttext']);

                    $result = array_filter(
                        $files, 
                        function ($item) use($base_filename) {
                            return basename($item['filename']) == $base_filename;
                        }
                    );
                    $new_img_id = $result[0]['id']; // Id récupéré de l'insertion
                    $new_img_filename = $result[0]['id']; // Filename récupéré de l'insertion
                    $img = new ModulaImage($new_img_filename, $new_img_id, $base_alt);
                    $img->save($gallery_id);
                }

                array_push($newGalleries, ["id"=>"$gallery_id"]);
            }

        } catch (Throwable $th) {
            wp_die("Error: " . $th->getMessage());
        }
    }

    private function getTableContent(string $table) {
        return $this->wpdb->get_results("SELECT * FROM {$this->wpdb->prefix}$table", ARRAY_A);
    }

    private function arraySearchForId(array $array, int $id) {
        foreach ($array as $key => $item) {
            if ($item['gid'] == $id) {
                return $key;
            }
        }
        return -1;
    }

    private function nggMoveFiles() {
        $source_dir = WP_CONTENT_DIR . $this->imgDirs['ngg'];
        $upload_dir = wp_get_upload_dir();
        $target_dir = $upload_dir['path'] . '/';

        if(!$this->devMode) wp_mkdir_p($target_dir);

        $gallery_dirs = array_diff(scandir($source_dir), ['.', '..']);
        $finalFiles = [];

        foreach ($gallery_dirs as $gallery_dir) {
            $gallery_dir_path = $source_dir . $gallery_dir;
            if (!is_dir($gallery_dir_path)) continue;

            foreach (array_diff(scandir($gallery_dir_path), ['.', '..']) as $file) {
                $source_file_path = $gallery_dir_path . '/' . $file;
                if (!is_file($source_file_path)) continue;

                $extension = pathinfo($file, PATHINFO_EXTENSION);
                if (!in_array(strtolower($extension), $this->authorizedExtensions)) continue;

                $target_file = $this->getUniqueFilename($target_dir, basename($file));
                if(!$this->devMode) copy($source_file_path, $target_file);
                array_push($finalFiles, $target_file);
            }
        }

        return $finalFiles;
    }

    private function getUniqueFilename(string $directory, string $filename): string {
        return wp_unique_filename($directory, $filename);
    }

    private function saveFiles(array $files) {
        $finalTab = [];

        foreach ($files as $filename) {
            $filetype = wp_check_filetype($filename);
            $attachment = [
                'guid'           => $this->url . '/' . str_replace(ABSPATH, '', $filename),
                'post_mime_type' => $filetype['type'],
                'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
                'post_content'   => '',
                'post_status'    => 'inherit',
            ];

            $attachment_id = wp_insert_attachment($attachment, $filename);

            require_once ABSPATH . 'wp-admin/includes/image.php';
            if(!$this->devMode) $attachment_data = wp_generate_attachment_metadata($attachment_id, $filename);
            if(!$this->devMode) wp_update_attachment_metadata($attachment_id, $attachment_data);

            array_push($finalTab, ["id" => $attachment_id, "filename" => $filename]);
        }

        return $finalTab;
    }
}
