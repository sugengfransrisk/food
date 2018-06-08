<?php 
session_start();
include 'koneksi.php';
$uname=$_POST['uname'];
$pass=md5 ($_POST['pass']);
$query=mysqli_query($con,"select * from user where username='$uname' and password='$pass'")or die(mysql_error());
$qontlo=mysqli_fetch_array($query);
if(mysqli_num_rows($query)==1){
	$_SESSION['user']=$uname;
	$_SESSION['id']=$qontlo['id'];
	$_SESSION['logged_in']=true;

	header("location:home.php");
}else{
	header("location:login.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}
// echo $pas;
 ?>