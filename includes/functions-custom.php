<?php

// Define helper functions for debugging
if (!function_exists('dump')) {
  function dump($data) {
    echo "<p style='white-space: pre'>";
    print_r($data);
    echo "</p>";
  }
}
if (!function_exists('dd')) {
  function dd($data) {
    dump($data);
    die();
  }
}
if (!function_exists('echoDump')) {
  function echoDump(string $str) {
    echo "<p style='white-space: pre'>";
    echo $str;
    echo "</p>";
  }
}
if (!function_exists('echoWarn')) {
  function echoWarn(string $str) {
    echo "<p style='white-space: pre'><span style='font-size: 200%'>⚠️ </span>";
    echo $str;
    echo "<span style='font-size: 200%'> ⚠️</span></p>";
  }
}
if (!function_exists('write_log')) {
  function write_log($log) {
    if (true === WP_DEBUG) {
      if (is_array($log) || is_object($log)) {
        error_log(print_r($log, true));
      } else {
        error_log($log);
      }
    }
  }
}