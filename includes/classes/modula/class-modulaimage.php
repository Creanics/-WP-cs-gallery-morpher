<?php

class ModulaImage {
  private $id;
  private $alt;
  private $title;
  private $description;
  private $halign;
  private $valign;
  private $link;
  private $target;
  private $width;
  private $height;
  private $togglelightbox;
  private $hide_title;

  public function __construct(string $filename, int $id, string $altText) {
      $this->halign = "center";
      $this->valign = "middle";
      $this->target = 0;
      $this->width = 2;
      $this->height = 2;
      $this->togglelightbox = 0;
      $this->hide_title = 0;
      $this->description = '';
      $this->link = '';
      
      $this->alt = $altText;
      $this->title = basename($filename);
      $this->id = $id;
  }
  public function get(): array {
    return array(
      "halign" => $this->halign,
      "valign" => $this->valign,
      "target" => $this->target,
      "width" => $this->width,
      "height" => $this->height,
      "togglelightbox" => $this->togglelightbox,
      "hide_title" => $this->hide_title,
      "description" => $this->description,
      "alt" => $this->alt,
      "link" => $this->link,
      "title" => $this->title,
      "id" => $this->id,
    );
  }
  public function save(int $gallery_id){
    if(metadata_exists('post', $gallery_id, 'modula-images')){
      $metaDatas = get_post_meta( $gallery_id, 'modula-images', true );
      array_push($metaDatas, $this->get());
      update_post_meta( $gallery_id, 'modula-images', $metaDatas );
    }else{
      add_post_meta( $gallery_id, 'modula-images', array($this->get()), true );
    }
  }
}