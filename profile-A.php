<?php
include_once('Connect.php');
session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
$user=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM  users  WHERE userId=0"));

$frq='';
    $day='';
    $time='';
if(!( empty($_POST['day']) || empty($_POST['time']) || empty($_POST['frq']))){
    
        $day=$_POST['day'];
        $time=$_POST['time'];
        $frq=$_POST['frq'];
    
}

exec('SCHTASKS /DELETE /TN RecommenderSystem /F');
exec('schtasks /Create /TN RecommenderSystem /TR "C:\Windows\System32\notepad.exe" /SC '.$frq.' /ST '.$time.' /SD '.$day.'');


if(!empty($_POST['act'])){
	header("location:RecommenderSystem.php");
	 
}
	}
mysqli_Close($con);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>RatedTV |Add</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->
        
<style>

  input,select{
    background-color: #131a20;
    color: aliceblue;
  }

</style>
	</head>

    <div class="back"></div>
	<body>
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="Home-A.php" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">RTV</h1>
							<small class="site-description">RatedTV</small>
						</div>
					</a> <!-- #branding -->

			<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item "><a href="Home-A.php">Home</a></li>
							<li class="menu-item m"><a href="Addmovie-A.php">Add movie</a></li>
							<li class="menu-item"><a href="logout.php" ><span style="color:#ef5350;">Logout</span></a></li>
							<li class="menu-item current-menu-item"><a href="profile-A.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul> <!-- .menu -->

					</div>
				
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
						</div>
                        <form method='post'> 
                        <div class="col-md-6" Style="border-style:solid;" >
               <br>
             <p>Name: <?php  echo "hello"//$user['username']; ?></p>
    
           
               Choose the wanted frequancy: <br><br>
 <input type="radio"  name="frq" value="DAILY"> Daily 
  <br><br>
   <input type="radio"  name="frq" value="WEEKLY"> Weekly
  <br><br>
   <input type="radio" name="frq" value="MONTHLY"> Mothly
               <br><br><hr>
               the starting Date :<br>
 <br><input type="text" name="day" placeholder="mm/dd/yyyy"><br><br><hr>
               the starting Time:<br>
 <br><input type="text" name="time" placeholder="HH:MM --> 24hours format">

 <br><br>
 </div>  
        <br><br>
  <input class="btn btn-info" type="submit" value="Schedule">    
    
  <input class="btn btn-success" type="submit" value="Activate now!" name ='act'>

 
  <br><br>
    </form>
	<?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }

      ?> 
	    
 
  
  <!-- <input name="submit" type ="submit" class="btn btn-info" value="Edit"></input> -->



		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
                      
	</body>
                   
</html>

