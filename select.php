<?php 
$con = mysqli_connect("localhost","root","root","dbstudent");
$query = "select * from tbuser";
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0 ) {
	while($rs = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$myObj[] = $rs;
	}	
	$arrayName = array('records' => $myObj );
	$myJSON = json_encode($arrayName);
	echo $myJSON;
}
?>