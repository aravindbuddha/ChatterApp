<?php
include 'config.php';
$controller=ucfirst($_GET['controller']);
$action=$_GET['action'];
$id=empty($_GET['id'])?null:$_GET['id'];
$data=file_get_contents('php://input');

include "controllers/$controller".".php";

$obj=new $controller;

//print_r($data);
//update
if(!empty($id)&&!empty($data)){
	$data=json_decode($data,true);
	$obj->$action($id,$data);
}
//for post
if(empty($id)&& !empty($data)){
	$data=json_decode($data,true);
	$obj->$action($data);
}
//get and delete action
if(!empty($id)&& empty($data)){
	$obj->$action($id);	
}

