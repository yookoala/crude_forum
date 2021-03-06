<?php

require __DIR__ . '/../../bootstrap.php';

use \CrudeForum\CrudeForum\Core;

// hard code all paths to start with '/temp/forum.php/'
$forum->setBasePath('/example.pathinfo/forum.php');
$forum->setBaseURL('http://localhost:8080/example.pathinfo/forum.php');

// render route
Core::bootstrap(
    $dispatcher,
    $forum,
    Core::routeHome('/forum', Core::routePathInfo())
);