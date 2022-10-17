<?php

include("Connect.php");

$a="";
$b="";

if( empty($_POST['username']) ||  empty($_POST['pwd'])){
    header("location:forget.php?error=Both feild required");}

   else{
        $a = $_POST["username"];
        $b= $_POST["pwd"];
        $res = mysqli_query($con,"SELECT * from users where username='$a'");
       
        if (mysqli_num_rows($res)>0){
            header("location:login page.php?success=Password Changed");
            $res = mysqli_query($con,"UPDATE users SET password='$b' where username='$a'");
        }
       else{
            header("location:login page.php?error=Username does not exsist try sign up");
        }
        
       
    }
mysqli_close($con);

?>