<?php
class Controller {
  public function __construct() {
      // Optional: Add any initialization code needed for all controllers
  }
  
  public function view($viewName, $data = [], $subfolder = '') {
      extract($data);
      $path = 'view/';
      if (!empty($subfolder)) {
          $path .= $subfolder . '/';
      }
      $path .= $viewName . '.php';
      
      if (!file_exists($path)) {
          throw new Exception("View file not found: " . $path);
      }
      require $path;
  }

  public function model($modelName) {
      require_once 'model/' . $modelName . '.php';
      return new $modelName();
  }
}