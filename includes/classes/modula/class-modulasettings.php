<?php

class ModulaSettings {
  private $type;
  private $grid_type;
  private $grid_row_height;
  private $grid_justify_last_row;
  private $grid_image_size;
  private $grid_image_dimensions;
  private $img_size;
  private $img_crop;
  private $grid_image_crop;
  private $gutter;
  private $tablet_gutter;
  private $mobile_gutter;
  private $width;
  private $height;
  private $randomFactor;
  private $shuffle;
  private $lightbox;
  private $show_navigation;
  private $hide_title;
  private $titleColor;
  private $titleFontSize;
  private $mobileTitleFontSize;
  private $hide_description;
  private $captionColor;
  private $captionFontSize;
  private $mobileCaptionFontSize;
  private $enableSocial;
  private $enableTwitter;
  private $enableFacebook;
  private $enableWhatsapp;
  private $enableLinkedin;
  private $enablePinterest;
  private $enableEmail;
  private $emailSubject;
  private $emailMessage;
  private $socialIconColor;
  private $socialIconSize;
  private $socialIconPadding;
  private $loadedScale;
  private $inView;
  private $effect;
  private $cursor;
  private $borderSize;
  private $borderRadius;
  private $borderColor;
  private $shadowSize;
  private $shadowColor;
  private $lazy_load;
  private $enable_responsive;
  private $tablet_columns;
  private $mobile_columns;
  private $style;
  private $last_visited_tab;
  private $upload_position;
  private $margin;
  private $filterClick;
  private $script;
  private $columns;

  public function __construct(){
    $this->borderColor = "#ffffff";
    $this->borderRadius = 0;
    $this->borderSize = 0;
    $this->captionColor = "#ffffff";
    $this->captionFontSize = 14;
    $this->cursor = "zoom-in";
    $this->effect = "pufrobo";
    $this->emailMessage = "here is the link to the image : %%image_link%% and this is the link to the gallery : %%gallery_link%%";
    $this->emailSubject = "check out this awesome image !!";
    $this->enable_responsive = "0";
    $this->enableEmail = "0";
    $this->enableFacebook = "0";
    $this->enableLinkedin = "0";
    $this->enablePinterest = "0";
    $this->enableSocial = "0";
    $this->enableTwitter = "0";
    $this->enableWhatsapp = "0";
    $this->grid_image_crop = "0";
    $this->grid_image_dimensions = ["width" => 0,"height" => 0];
    $this->grid_image_size = "medium";
    $this->grid_justify_last_row = "justify";
    $this->grid_row_height = 250;
    $this->grid_type = "automatic";
    $this->gutter = 10;
    $this->height = [800, 800, 800];
    $this->hide_description = "0";
    $this->hide_title = true;
    $this->img_crop = true;
    $this->img_size = 200;
    $this->inView = "0";
    $this->last_visited_tab = "modula-general";
    $this->lazy_load = true;
    $this->lightbox = "fancybox";
    $this->loadedScale = 100;
    $this->mobile_columns = 1;
    $this->mobile_gutter = 10;
    $this->mobileCaptionFontSize = 10;
    $this->mobileTitleFontSize = 12;
    $this->randomFactor = 50;
    $this->shadowColor = "#ffffff";
    $this->shadowSize = 0;
    $this->show_navigation = true;
    $this->shuffle = "0";
    $this->socialIconColor = "#ffffff";
    $this->socialIconPadding = 10;
    $this->socialIconSize = 16;
    $this->style = "";
    $this->tablet_columns = 2;
    $this->tablet_gutter = 10;
    $this->titleColor = "#ffffff";
    $this->titleFontSize = 16;
    $this->type = "grid";
    $this->upload_position = "end";
    $this->width = "100%";

    $this->margin = '10';
    $this->filterClick = 0;
    $this->script = '';
    $this->columns = 6;
  }
  public function get(): array {
    return array(
      "type" => $this->type,
      "grid_type" => $this->grid_type,
      "grid_row_height" => $this->grid_row_height,
      "grid_justify_last_row" => $this->grid_justify_last_row,
      "grid_image_size" => $this->grid_image_size,
      "grid_image_dimensions" => $this->grid_image_dimensions,
      "img_size" => $this->img_size,
      "img_crop" => $this->img_crop,
      "grid_image_crop" => $this->grid_image_crop,
      "gutter" => $this->gutter,
      "tablet_gutter" => $this->tablet_gutter,
      "mobile_gutter" => $this->mobile_gutter,
      "width" => $this->width,
      "height" => $this->height,
      "randomFactor" => $this->randomFactor,
      "shuffle" => $this->shuffle,
      "lightbox" => $this->lightbox,
      "show_navigation" => $this->show_navigation,
      "hide_title" => $this->hide_title,
      "titleColor" => $this->titleColor,
      "titleFontSize" => $this->titleFontSize,
      "mobileTitleFontSize" => $this->mobileTitleFontSize,
      "hide_description" => $this->hide_description,
      "captionColor" => $this->captionColor,
      "captionFontSize" => $this->captionFontSize,
      "mobileCaptionFontSize" => $this->mobileCaptionFontSize,
      "enableSocial" => $this->enableSocial,
      "enableTwitter" => $this->enableTwitter,
      "enableFacebook" => $this->enableFacebook,
      "enableWhatsapp" => $this->enableWhatsapp,
      "enableLinkedin" => $this->enableLinkedin,
      "enablePinterest" => $this->enablePinterest,
      "enableEmail" => $this->enableEmail,
      "emailSubject" => $this->emailSubject,
      "emailMessage" => $this->emailMessage,
      "socialIconColor" => $this->socialIconColor,
      "socialIconSize" => $this->socialIconSize,
      "socialIconPadding" => $this->socialIconPadding,
      "loadedScale" => $this->loadedScale,
      "inView" => $this->inView,
      "effect" => $this->effect,
      "cursor" => $this->cursor,
      "borderSize" => $this->borderSize,
      "borderRadius" => $this->borderRadius,
      "borderColor" => $this->borderColor,
      "shadowSize" => $this->shadowSize,
      "shadowColor" => $this->shadowColor,
      "lazy_load" => $this->lazy_load,
      "enable_responsive" => $this->enable_responsive,
      "tablet_columns" => $this->tablet_columns,
      "mobile_columns" => $this->mobile_columns,
      "style" => $this->style,
      "last_visited_tab" => $this->last_visited_tab,
      "upload_position" => $this->upload_position,
      "margin" => $this->margin,
      "filterClick" => $this->filterClick,
      "script" => $this->script,
      "columns" => $this->columns,
    );
  }
}