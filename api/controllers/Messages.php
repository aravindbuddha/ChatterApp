<?php
class Messages{
	function get($id=null){
		$out=[];
		if(empty($id)){
			$sql="SELECT * FROM messages";
		}else{
			$sql="SELECT * FROM messages WHERE ID=$id";
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
