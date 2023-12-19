<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  height: 100%;
  width: auto;
  position: fixed;
  background-image: url("p.jpg");
  

  


  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<h2>Insert your cows/goat information</h2>
<div class="bg-img">
  <form action="bepari_insert.php" method="POST" enctype="multipart/form-data" class="container">
    <h1>Login</h1>

    
    <label for="text"><b>contactno</b></label>
    <input type="text" placeholder="Enter contactno"  name="contactno" required>

    <label for="text"><b>Cow_Name</b></label>
    <input type="text" placeholder="Enter Cow_Name"  name="cow_name" required>

    <label for="text"><b>cow_price</b></label>
    <input type="text" placeholder="Enter cow_price" name="cow_price" required>

    <label for="file"><b>cow_image</b></label>
    <input type="file" name="uploadimage" />

    <button type="submit" class="btn">Submit</button>
    
  </form>
</div>
</body>
</html>

<?php
include('connection_with_db.php');
error_reporting(0);
session_start();
$email=$_SESSION['email'];
$show="SELECT * FROM register where b_email='$email'";
$name=$_GET['b_name'];
$location = $_GET['b_location'];
if(isset($_POST['cow_name']) && isset($_POST['cow_price']) && isset($_FILES['uploadimage']) && isset($_POST['contactno'])){
    $bepari_location=$_POST['bepari_location'];
    $cow_name=$_POST['cow_name'];
    $contactno=$_POST['contactno'];
    $cow_price=$_POST['cow_price'];
    $filename=$_FILES['uploadimage']['name'];
    $tmpname=$_FILES['uploadimage']['tmp_name'];
    $folder="cow_pic/".$filename;
    move_uploaded_file($tmpname,$folder);

$q="INSERT INTO bepari(contactno,cow_name,cow_price,cow_image,b_email)VALUES('$contactno','$cow_name','$cow_price','$folder','$email')";
$r=mysqli_query($con,$q);
if($r)
{
  echo"<h1>input succesfull</h1>";
}
else
{
    echo"please fill corectly";
}
}
?>