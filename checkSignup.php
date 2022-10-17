<?php
session_start();
include("Connect.php");

$semail='Semail';
$suser='suser';
$spass='spass';
$respass='respass';

if(!( empty($_POST['suser']) || empty($_POST['Semail']) || empty($_POST['spass']) || empty($_POST['respass']))){
$semail=$_POST['Semail'];
$suser=$_POST['suser'];
$spass=$_POST['spass'];
$respass=$_POST['respass'];
    
    
    $result=mysqli_query($con,"SELECT * from users where email='$semail'");
    if(mysqli_num_rows($result)>0){
            header("location:login page.php?error=Email already used");
    }
    else{
        $result=mysqli_query($con,"SELECT * from users where username ='$suser'");
         if(mysqli_num_rows($result)>0){
            header("location:login page.php?error=Username already used");
    }else{
        if($spass==$respass){
           

            $count=(mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(userId) FROM users")));
            $id= $count['MAX(userId)']+1;
            $_SESSION['login']= $id;
            mysqli_query($con," INSERT INTO users VALUES ('$id','$semail','$spass','$suser','','','','') ");
            header("location:profile_edit.php");

            }else{header("location:login page.php?error=Passwords dont match");
                 }
                }    
    }
}
else{
     header("location:login page.php?error=All feild required");
    }
mysqli_close($con);
?>