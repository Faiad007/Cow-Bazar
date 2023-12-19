<?php
include('connection_with_db.php');
error_reporting(0);
$bepari_id=$_GET['bepari_id'];
$d="DELETE FROM bepari WHERE bepari_id='$bepari_id'";
$q=mysqli_query($con,$d);
if($q)
{
	echo"<font color='green'>Deleted from database";
	echo $bepari_id;
}
else
{
	echo"<font color='red'>Failed to delete";
}
?>