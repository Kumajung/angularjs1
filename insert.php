<?php 
$con = mysqli_connect("localhost","root","root","dbstudent");
$data = json_decode(file_get_contents("php://input"));
if(count($data) > 0){
 	$fname = mysqli_real_escape_string($con,$data->fName); 
 	$lname = mysqli_real_escape_string($con,$data->lName);
 	$id    = mysqli_real_escape_string($con,$data->id);
 	$btnName = $data->btnName;

 	if($btnName == "Insert"){
 		$query = "insert into tbuser(fname,lname) values('$fname','$lname')";
 		if(mysqli_query($con,$query)){
 			echo "Data Inserted";
 		}else{
 			echo "Error";
 		}

 	}

 	if($btnName == "Update"){
 		$query = "update tbuser set fname = '$fname',lname = '$lname' where id = $id ";
 		if(mysqli_query($con,$query)){
 			echo "Data Complete";
 		}else{
 			echo "Error";
 		}

 	}
} 
?>
