<?php
include('connection_with_db.php');
error_reporting(0);
session_start();
$email=$_SESSION['email'];
$q="SELECT * FROM register WHERE b_email='$email'";
$r=mysqli_query($con,$q);
if(mysqli_num_rows($r)>0){
    $data=mysqli_fetch_assoc($r);
    $name=$data['b_name'];
}
else
{
    echo"failed";
}
?>


<html>
<head>
<body>
<style>
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
table{
	border-collapse:collapse;
	width:100%;
	color:#588c7e;
	font-family:monospace;
	font-size:25px;
	text-align:center;
}
th{
	background-color:#d96459;
	color:white;
}
tr:nth-child(even){background-color:#f2f2f2;}
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 3px 7px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 15px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}


a:hover, a:active {
  background-color: red;
}
</style>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="bepari_insert.php">insert-cow</a></li>
  <li><a href="logout.php">logout</a></li>
</ul>
<h1 style='color: red'><?php echo$name."'s_account";?></h1>
<table>
<tr> <th>cow_name</th>   <th>cow_price</th><th>cow_image</th></tr>
<?php
$show="SELECT * FROM bepari where b_email='$email'";
$q=mysqli_query($con,$show);
if($q)
{
while($data=mysqli_fetch_assoc($q))
{
	$bepari_id=$data['bepari_id'];
	$cow_name=$data['cow_name'];
$cow_price=$data['cow_price'];
$cow_image=$data['cow_image'];

?>
<tr> <td><?php echo$cow_name;?></td>   <td><?php echo$cow_price;?></td><td><img src="<?php echo$cow_image;?>"  width="100" height="73"></td><?php echo"<td><a href='bepari_update.php?bepari_id=$data[bepari_id]'>edit</td><td><a href='bepari_delete.php?bepari_id=$data[bepari_id]'>delete</a></td></tr>";

}
}

?>
</table>

</body>
</head>
</html>