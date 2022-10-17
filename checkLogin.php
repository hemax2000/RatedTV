<?php
session_start();
include_once("Connect.php");

$a="";
$b="";

if( empty($_POST['username']) ||  empty($_POST['pwd'])){
    header("location:login page.php?error=Both feild required");}

   else{
        $a = $_POST["username"];
        $b= $_POST["pwd"];
        $res = mysqli_query($con,"SELECT * from users where username='$a' AND password='$b'");
       
       
       if( $a == 'ibrahim'&& $b =='123456'){
            $_SESSION['login']= "Admin";
            header("location:Home-A.php");
       }
       else{
        if (mysqli_num_rows($res)>0){
            $userid=mysqli_fetch_object($res);
            
            $_SESSION['login']= $userid->userId;
            header("location:Home.php");
            
        }
       else{
            header("location:login page.php?error=Invalid Username or Password");
        }
        
       }
    }
mysqli_close($con);
?>