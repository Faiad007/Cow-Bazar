<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='qurbani';
$con=mysqli_connect($hostname,$username,$password,$dbname);
if($con)
{
	echo"";
}
else
{
	echo"conn false";
}
?>