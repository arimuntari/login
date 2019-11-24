<?php 
session_start();
include "global/config.php";

$username = $_POST["username"];
$password = $_POST["password"];

//echo "username = ".$username." --- password = ".$password;

$sql = "select * from user where username = '$username' and password = '$password'";
$query = mysqli_query($con, $sql);
$jml = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);

/*while($row = mysqli_fetch_array($query)){
	
}*/

if($row["username"] == $username and $password == $row["password"] ){
	$_SESSION["session_username"] = $row["username"];
	$_SESSION["session_password"] = $row["password"];
	$_SESSION["session_nama"] = $row["nama"];
	header("Location: admin/index.php");
}else{
	echo "Login Gagal";
	header("Location: index.php");
}
?>