<?php
session_start();
if ($_SESSION['logged_in']==true) {
	header("location:home.php");
}else{
	header("location:login.php");
}