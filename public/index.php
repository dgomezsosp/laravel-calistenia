<?php

// Application: clase para configurar la aplicación
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
// Require_once, una vez ya se ha cargado la variable, no se vuelve a cargar
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// app se queda escuchando por llamadas
$app->handleRequest(Request::capture());


// Se deja todo preparado para que la llamada que se recibe se capture y se pasa a la aplicación. 