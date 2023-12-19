<?php
include('connection_with_db.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html {
  box-sizing: border-box;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: sticky;
  top: 0;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
</style>
</head>
<body>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="login.php">login</a></li>
  <li><a href="register.php">registration</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>
<h1 style="text-align: center; font-size: 90px;">Cow Bazar</h1>
<img src="img.jpg" width="100%" height="500">
<br>

<div class="row">
<?php
session_start();
$show="SELECT * FROM bepari";
$q=mysqli_query($con,$show);
if($q)
{
while($data=mysqli_fetch_assoc($q))
{
    ?>
  <div class="column">
    <div class="card">
    <?php
    echo"<a href='view.php? bepari_id=$data[bepari_id]'><img src='$data[cow_image]' style='height:300px' style='width:100%' /> </a>";
    ?>
    <div class="container">
        <p class="title"> <?php echo $data["cow_name"]; ?></p>
        <p><?php echo $data["cow_price"] ?></p>
        <p><?php echo $data["bepari_id"] ?></p>
       
      </div>
    </div>
  </div>
  <?php
}
}
?>
</div>

</body>
</html>
