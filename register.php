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
  <form action="" method="POST" class="container">
    <h1>Login</h1>

    <label for="text"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="text"><b>name</b></label>
    <input type="text" placeholder="Enter name" name="name" required>

    <label for="text"><b>Location</b></label>
    <input type="text" placeholder="Enter Location" name="location" required>

    <label for="text"><b>password</b></label>
    <input type="password" placeholder="Enter password" name="pass" required>

    <button type="submit" class="btn">Submit</button>
    
  </form>
</div>
</body>
</html>
<?php
include('connection_with_db.php');
error_reporting(0);


if(isset($_POST['name']) && isset($_POST['location'])&& isset($_POST['email']) && isset($_POST['pass'])){
  $name=$_POST['name'];
    $location=$_POST['location'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
   

$q="INSERT INTO register (b_email,b_name,b_location,b_pass) VALUES('$email','$name','$location','$pass')";
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
