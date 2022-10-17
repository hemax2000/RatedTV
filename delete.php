<?php
include_once('Connect.php');

if(!empty($_GET['id'])){
$id=$_GET['id'];
mysqli_query($con,"DELETE FROM movies WHERE movieId=$id");
mysqli_query($con,"DELETE FROM ratings WHERE movieId=$id");
mysqli_close($con);
header("location:Home-A.php");
}
?>