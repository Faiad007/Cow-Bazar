<?php
include('connection_with_db.php');
error_reporting(0);
$bepari_id=$_GET['bepari_id'];
echo $bepari_id;
$sql="SELECT * FROM bepari WHERE bepari_id='$bepari_id'";
 $s=mysqli_query($con,$sql);
 $data=mysqli_fetch_assoc($s);
 $cow_name=$data['cow_name'];
$cow_price=$data['cow_price'];
$cow_im=$data['cow_image'];
$contactno=$data['contactno'];


if(($_FILES['uploadimage']['name'])=='')
{
if(isset($_POST['cow_name']) && isset($_POST['cow_price']) && isset($_POST['contactno'])){
    $cow_name=$_POST['cow_name'];
    $contactno=$_POST['contactno'];
    $cow_price=$_POST['cow_price'];

$q="UPDATE bepari SET  cow_name='$cow_name',cow_price='$cow_price',cow_image='$cow_im',contactno='$contactno' WHERE bepari_id='$bepari_id'";
$r=mysqli_query($con,$q);
if($r)
{
    header('Location: bepari_display.php');
}
else
{
    echo"please fill corectly";
}
}
}
else
{
if(isset($_POST['cow_name']) && isset($_POST['cow_price']) && isset($_FILES['uploadimage']) && isset($_POST['contactno'])){
    $cow_name=$_POST['cow_name'];
    $contactno=$_POST['contactno'];
    $cow_price=$_POST['cow_price'];
    $filename=$_FILES['uploadimage']['name'];
    $tmpname=$_FILES['uploadimage']['tmp_name'];
    $folder="cow_pic/".$filename;
    move_uploaded_file($tmpname,$folder);
    unlink($cow_im);

$q="UPDATE bepari SET  cow_name='$cow_name',cow_price='$cow_price',cow_image='$folder',contactno='$contactno' WHERE bepari_id='$bepari_id'";
$r=mysqli_query($con,$q);
if($r)
{
    header('Location: bepari_display.php');
}
else
{
    echo"please fill corectly";
}
}
}

?>
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
  background-image: url("");
  

  


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
  <form action="" method="POST" enctype="multipart/form-data" class="container">
    <h1>update</h1>

    
    <label for="text"><b>contactno</b></label>
    <input type="text"   value="<?php echo"$contactno";?>" name="contactno" required>

    <label for="text"><b>Cow_Name</b></label>
    <input type="text"   value="<?php echo$cow_name;?>"  name="cow_name" required>

    <label for="text"><b>cow_price</b></label>
    <input type="text"  value="<?php echo$cow_price;?>"  name="cow_price" required>

    <label for="file"><b>cow_image</b></label>
    <input type="file" name="uploadimage" />
    <img src="<?php echo"cow_pic/".$cow_image;?>"width="100" height="73">

   
    <button type="submit" class="btn">update</button>
    
    </form>
  </div>
  </body>
  </html>