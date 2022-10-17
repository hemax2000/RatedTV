<?php

include_once('Connect.php');

if(!empty($_GET['id'])){
$id=$_GET['id'];
mysqli_query($con,"UPDATE movies SET Accept=1 WHERE movieId=$id");
mysqli_close($con);
header("location:Home-A.php");
}
?>
