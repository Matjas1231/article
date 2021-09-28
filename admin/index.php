<?php
declare(strict_types=1);
spl_autoload_register(function(string $classNamespace) {
    $path = str_replace(['\\', 'App/Admin'], ['/', ''], $classNamespace);
    $path = "src/$path.php";
    require_once($path);
});
use App\Admin\Controller\AdminController;
use App\Admin\Controller\CategoryController;
use App\Admin\Controller\UserController;
use App\Admin\Request;

require_once('src/utils/debug.php');
session_start();
$config = require_once('config/config.php');

$request = new Request($_GET, $_POST, $_SERVER);

(new AdminController($request, $config))->run();
(new CategoryController($request, $config))->run();
(new UserController($request, $config))->run();