<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use \App\Library\Router;
use \App\Controllers\{
    HomeController,
    AboutController,
    InvoiceController
};
use \App\Views\{
    Home as HomeView,
    About as AboutView,
    Invoice as InvoiceView
};

/* Super simple Dependency Injection (DI) */
$views = [
    "home" => new HomeView(),
    "about" => new AboutView(),
    "invoice" => new InvoiceView(),
];
$controllers = [
    "home" => new HomeController($views["home"]),
    "about" => new AboutController($views["about"]),
    "invoice" => new InvoiceController($views["invoice"]),
];
/*****************************************/

$router = new Router();
$router
    ->get("/", $controllers['home']->index())
    ->get("/about", $controllers['about']->index())
    ->get("/invoice", $controllers['invoice']->index())
    ->post("/invoice", $controllers['invoice']->store());

try {
    echo $router->resolve($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
} catch (Exception $ex) {
    echo '404 not found';
}
