<?php
// include 'config.php';

if(empty($_GET['param'])){
 	$class="404";
	$action="404";
}else{
	$param=explode('/', $_GET['param']);
	$size=sizeof($param);
	$format=explode('.', $param[$size-1]);
	$format=$format[1];
	$format=isset($format)?$format:"json";
	if($size==1){
		$class=$param[0];
		$action="get";
	}else if($size==2){
		$class=$param[0];
		$action=$param[1];
	}else{
		$class=$param[0];
		$action=$param[1];
		$id=$param[2];
	}
}
//To get 
//echo "class:$class,action:$action,id:$id,format:$format";

$class=ucfirst($class);
$data=file_get_contents('php://input');
$data=json_decode($data,true);
if(file_exists("component/$class/$class".".php")){
	include "component/$class/$class".".php";	
}else{
	include "component/_404/_404".".php";	
	$class="_404";
	$obj=new $class;
	return;
}

$obj=new $class;

//print_r($data);
//update
if(!empty($id)&&!empty($data)){
	
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
//get
if(empty($id)&&empty($data)){
	$obj->$action();
}

