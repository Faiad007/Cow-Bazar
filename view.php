<?php
include('connection_with_db.php');
error_reporting(0);
$id=$_GET['bepari_id'];
$q="SELECT * FROM bepari WHERE bepari_id='$id'";
$r=mysqli_query($con,$q);
if(mysqli_num_rows($r)>0){
    $data=mysqli_fetch_assoc($r);
    $cow_name=$data['cow_name'];
$cow_price=$data['cow_price'];
$cow_image=$data['cow_image'];
$b_email=$data['b_email'];
$contactno=$data['contactno'];
}
else
{
    echo"failed";
}
$q="SELECT * FROM register WHERE b_email='$b_email'";
$r=mysqli_query($con,$q);
if(mysqli_num_rows($r)>0){
    $data=mysqli_fetch_assoc($r);
    $name=$data['b_name'];
    $location=$data['b_location'];
   
}
else
{
    echo"failed";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
.padding {
  border: 1px solid black;
  padding: 25px 70px 50px 100px;
  background-color: lightblue;
}
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 500px; 


body {
  font-family: Arial, Helvetica, sans-serif;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}
/* Style the header */

/* Create three equal columns that floats next to each other */

</style>
<body>

<div class="column">


    <img src="<?php echo $cow_image;?>" width="100%" height="100%">

</div>

<div class="column">
<div class="padding">
<h1>Information</h2>
    <h3><?php
    
   echo "Cow owner name is ".$name."<br><br>";
   echo  "Cow owner location is ".$location."<br><br>";
   echo    "Cow name is ".$cow_name."<br><br>";
   echo  "Cow price is ".$cow_price."<br><br>";

   echo"Contact with cow owner just mail to this email: ".$b_email."<br><br>";
   echo"or<br><br>";
   echo"Contact with cow owner just call to this : ".$contactno."<br><br>";
   ?>
    </h3>
    
</div>
</div>

</body>
</html>