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

  public function __construct(string $filename, int $id) {
      $this->halign = "center";
      $this->valign = "middle";
      $this->target = 0;
      $this->width = 2;
      $this->height = 2;
      $this->togglelightbox = 0;
      $this->hide_title = 0;

      $this->title = basename($filename);
      $this->id = $id;
  }
}