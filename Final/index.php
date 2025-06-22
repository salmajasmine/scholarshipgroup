<?php
session_start();

// Autoloader untuk class di folder core, controller, dan model
spl_autoload_register(function ($class) {
    if (file_exists("core/{$class}.php")) {
        require_once "core/{$class}.php";
    } elseif (file_exists("controller/{$class}.php")) {
        require_once "controller/{$class}.php";
    } elseif (file_exists("model/{$class}.php")) {
        require_once "model/{$class}.php";
    }
});

$controller = $_GET['c'] ?? 'Auth';
$method = $_GET['m'] ?? 'login';

$controllerFile = "controller/{$controller}Controller.php";

$controllerClass = $controller . 'Controller';

// Cek file dan class
if (file_exists($controllerFile)) {
    require_once $controllerFile; 

    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();

        if (method_exists($controllerInstance, $method)) {
            $controllerInstance->$method();
        } else {
            die("Method <strong>$method</strong> tidak ditemukan di controller <strong>$controllerClass</strong>");
        }
    } else {
        die("Class <strong>$controllerClass</strong> tidak ditemukan");
    }
} else {
    die("Controller file <strong>$controllerFile</strong> tidak ditemukan");
}
