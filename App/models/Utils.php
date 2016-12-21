<?php
  class Utils {

    public static function formataData($data) {
      $data = substr($data, 8, 2) . '/' . substr($data, 5, 2) . '/' . substr($data, 0, 4);
      return $data;
    }

  }
?>
