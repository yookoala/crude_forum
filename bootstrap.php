<?php

// for debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// common bootstrap code
require_once __DIR__ . '/configuration.php';
require_once __DIR__ . '/vendor/autoload.php';

global $forum;
$forum = new \ywsing\CrudeForum\Core([
    'logDirectory' => CRUDE_DIR_LOGS,
    'dataDirectory' => CRUDE_DIR_DATA,
    'administrator' => CRUDE_ADMIN,
]);

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    require __DIR__ . '/routes.php';
});
