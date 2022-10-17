

<?php
session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
$us=$_SESSION['login'];
include_once("Connect.php");
if(!empty($_POST['submit'])){
	if(!(empty($_POST['name'])||empty($_POST['des'])||empty($_POST['com'])||empty($_POST['rate'])||empty($_POST['year'])||empty($_POST['poster'])||empty($_POST['geners']))){
$name=$_POST['name'];
$des=$_POST['des'];
$com=$_POST['com'];
(int)$rate =$_POST['rate'];
(int)$year=$_POST['year'];
$urt=$_POST['poster'];
$geners=$_POST['geners'];

$id=mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(movieId) FROM movies"));
$i=$id['MAX(movieId)']+1;
mysqli_query($con,"INSERT INTO movies VALUES ($i,'$name','$geners','$des',$year,0,'$urt')");
mysqli_query($con,"INSERT INTO ratings VALUES ($us,$i,$rate,0,'$com')");
mysqli_close($con);
header("location:Addmovie.php?success=Sent");
}

else{
mysqli_close($con);
header("location:Addmovie.php?error=All feild required");
}
}
if(!empty($_POST['reset'])){
	header("location:Addmovie.php?success=Canceled");
}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<style>
			        #rating *{
    margin: 0;
    padding: 0;
}
#rating .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
#rating .rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
#rating .rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:gray;
	
}
#rating .rate:not(:checked) > label:before {
    content: '★ ';
	
}
#rating .rate > input:checked ~ label {
    color: #ffc700;    
}
#rating .rate:not(:checked) > label:hover,
#rating .rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
#rating.rate > input:checked + label:hover,
#rating .rate > input:checked + label:hover ~ label,
#rating .rate > input:checked ~ label:hover,
#rating .rate > input:checked ~ label:hover ~ label,
#rating .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
		</style>


		<title>RatedTV | Add</title>

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
        

	</head>

    <div class="back"></div>
	<body>
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="Home.php" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">RTV</h1>
							<small class="site-description">RatedTV</small>
						</div>
					</a> <!-- #branding -->

			<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item "><a href="Home.php">Home</a></li>
							<li class="menu-item current-menu-item"><a href="Addmovie.php">Add movie</a></li>
							<li class="menu-item"><a href="Search.php">Search</a></li>
							<li class="menu-item" ><a href="logout.php"><span style="color:#ef5350;">Logout</span></a></li>
                            <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul>  <!-- .menu -->

					</div>
				
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
							
						</div>
                        
                        <div> 
                        <form method="POST">
                            name of the show:  <input type="text" placeholder="e.g titanic" style="background-color: #131a20; color: aliceblue;margin:20px;" name="name">
							year: <input type="text" placeholder="e.g 1999" style="background-color: #131a20; color: aliceblue; margin:20px;" name="year">
							geners:<input type="text" placeholder="e.g Action|Adventure|Th...|" style="background-color: #131a20; color: aliceblue; margin:20px" name="geners"><br>
						   description: 
                              <br>
                            <textarea rows="10" cols="120"style="background-color: #131a20;color: aliceblue; " name= "des" >
                                
                            </textarea>
                            <br><br>
                           
                            Comments:
                            <br>
                            <textarea rows="10" cols="120"style="background-color: #131a20;color: aliceblue;" name="com" >
                                
                            </textarea>
                            <br><br>

							 URL of poster: <br>
                            
                          
					<input type="text" placeholder="e.g https://static.dw.com/image/18686404_101.jpg" style="background-color: #131a20;color: aliceblue;" name ="poster" >
                           <br><br>
							Rate: <div id="rating">
								<div class="rate">
								   <input type="radio" id="star5" name="rate" value="5" />
								   <label for="star5" title="text">5 stars</label>
								   <input type="radio" id="star4" name="rate" value="4" />
								   <label for="star4" title="text">4 stars</label>
								   <input type="radio" id="star3" name="rate" value="3" />
								   <label for="star3" title="text">3 stars</label>
								   <input type="radio" id="star2" name="rate" value="2" />
								   <label for="star2" title="text">2 stars</label>
								   <input type="radio" id="star1" name="rate" value="1" />
								   <label for="star1" title="text">1 star</label>
								 </div>
							   </div>
                            <br><br> <br>
							
							<input name="submit" type ="submit" class="btn btn-info" value="Send"></input>
							<input name="reset" type ="submit" class="btn btn-danger" value="Cancel"></input>
 </form>

		<!-- Default snippet for navigation -->
		<br>
		<?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }

      ?>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
                   
</html>
