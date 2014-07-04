<?php
include 'config.php';
$controller=ucfirst($_GET['controller']);

include "controllers/$controller".".php";
$obj=new $controller;
$obj->get();

