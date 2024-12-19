<?php

// Define helper functions for debugging
if (!function_exists('dump')) {
  function dump($data) {
      echo "<p style='white-space: pre'>";
      var_dump($data);
      echo "</p>";
  }
}
if (!function_exists('dd')) {
  function dd($data) {
      dump($data);
      die();
  }
}