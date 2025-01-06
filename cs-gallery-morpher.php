<?php
/**
 * Plugin Name: CS GalleryMorpher
 * Description: A WordPress plugin to transform and migrate image galleries.
 * Version: 1.0.0
 * Author: Cyprien Siaud
 */

require_once(plugin_dir_path(__FILE__).'/includes/class-morpher.php');

// Créez le menu dans le tableau de bord admin
add_action('admin_menu', 'galmorph_add_admin_menu');
function galmorph_add_admin_menu() {
    add_menu_page(
        'Gallery Morpher',
        'Gallery Morpher',
        'manage_options',
        'cs-gallery-morpher',
        'galmorph_render_admin_page',
        'dashicons-migrate',
        100
    );
}

// Affiche la page admin
function galmorph_render_admin_page() {
    ?>
    <div class="wrap">
        <h1>Gallery Morpher</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="from">Plugin d'origine :</label></th>
                    <td>
                        <select name="from" id="from">
                            <option value="ngg">NextGEN Gallery</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="to">Plugin de destination :</label></th>
                    <td>
                        <select name="to" id="to">
                            <option value="modula">Modula</option>
                        </select>
                    </td>
                </tr>
            </table>
            <p class="submit">
                <button type="submit" name="migrate" class="button button-primary">MIGRER</button>
            </p>
        </form>
    </div>
    <?php
    if (isset($_POST['migrate'])) {
        $from = sanitize_text_field($_POST['from']);
        $to = sanitize_text_field($_POST['to']);
        
        $function = null;
        $func_list = get_option('galmorph_func_list');
        if(!empty($func_list) && isset($func_list[$from])){
            if(!empty($func_list[$from]) && isset($func_list[$from][$to])){
                $morpher = new Morpher();
                $function = $func_list[$from][$to];
                $morpher->$function();
            }else{
                echoWarn("Le plugin source \"$to\" est inconnu ou n'est pas pris en charge.");
            }
        }else{
            echoWarn("Le plugin de destination \"$from\" est inconnu ou n'est pas pris en charge.");
        }

        echo '<div class="updated"><p>Migration exécutée avec succès.</p></div>';
    }
}

// Chargement des fichiers de traduction
add_action('plugins_loaded', 'galmorph_load_textdomain');
function galmorph_load_textdomain() {
    load_plugin_textdomain('cs-gallery-morpher', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}


// Configuration à l'installation
register_activation_hook(__FILE__, 'galmorph_activate_plugin');
function galmorph_activate_plugin() {
    // Ajoutez des options par défaut si elles n'existent pas
    if (!get_option('galmorph_func_list')) {
        add_option('galmorph_func_list', [
          "ngg" => [
            "modula" => "nggToModula"
          ]
        ]);
    }
}

// Supprimez les options à la désinstallation
register_uninstall_hook(__FILE__, 'galmorph_uninstall_plugin');
function galmorph_uninstall_plugin() {
    delete_option('galmorph_default_settings');
}
