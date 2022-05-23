<?php

use mvc\Dispatcher;
use mvc\Models\TaskResourceModel;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]) . 'src/');
define('BASEPATH', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));
require BASEPATH . '/vendor/autoload.php';
require(ROOT . 'Config/core.php');
require(ROOT . 'Router.php');
require(ROOT . 'Request.php');
require(ROOT . 'Dispatcher.php');



$dispatch = new Dispatcher();
$dispatch->dispatch();
