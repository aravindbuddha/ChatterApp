<?php
class Users{
	function get($id=null){
		$out=[];
		if(empty($id)){
			$sql="SELECT * FROM users";
		}else{
			$sql="SELECT * FROM users WHERE ID=$id";
		}
		$result=mysql_query($sql);
		//loopover all records
		while ($row=mysql_fetch_assoc($result)) {
			array_push($out, $row);
		}
		echo json_encode($out);
	}
	function post($data){

	}
	function update($dat){

	}
	function delete($id){

	}
}
