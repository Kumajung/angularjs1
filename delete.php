<?php 
$con = mysqli_connect("localhost","root","root","dbstudent");
$data = json_decode(file_get_contents("php://input"));
$id    = mysqli_real_escape_string($con,$data->id);
$query = "delete from tbuser where id = $id";
	if(mysqli_query($con,$query)){
		echo "Delete Complete";
	}else{
		echo "Error";
	}
?>