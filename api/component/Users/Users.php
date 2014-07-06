<?php
include '../lib/response.php';

class Users{
	function get($id=null){
		echo "user get";
		// $out="";
		// if(empty($id)){
		// 	$sql="SELECT * FROM users";
		// }else{
		// 	$sql="SELECT * FROM users WHERE ID=$id";
		// }
		// $result=mysql_query($sql);
		// //loopover all records
		// while ($row=mysql_fetch_assoc($result)) {
		// 	array_push($out, $row);
		// }
		// echo json_encode($out);
	}
	function post($data){
		print_r($data);
		$sql="INSERT INTO users(Name,Email,Pass,isonline) VALUES ('".$data['Name']."', '".$data['Email']."', '".$data['Pass']."', '".$data['isonline']."')";
		$result=mysql_query($sql);
		if($result){
			echo json_encode(array(
				"msg"=>"ok"
			));
		}		
		
	}
	function update($dat){
		echo "update";
	}
	function delete($id){

	}
}
