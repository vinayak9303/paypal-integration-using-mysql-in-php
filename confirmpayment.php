<?php
include_once 'connect.php';
$id=$_POST['id'];
$amount=$_POST['amount'];
$sql="INSERT INTO `payment`(`payment_id`, `amount`) VALUES ('".$id."','".$amount."')";
$result=mysqli_query($conn,$sql);
if($result)
{
	$data = array("success" => 1);
}
else{
	$data = array("success" => 0);
}

echo json_encode($data);
?>