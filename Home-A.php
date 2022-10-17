<?php
session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
include_once('Connect.php');
$movies=mysqli_query($con,"SELECT * FROM  movies  WHERE Accept=0");
mysqli_close($con);
	}
?>

<!DOCTYPE html>
<html lang="en";
>
	<head>
	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<meta name='viewport' content='width=device-width, initial-scale=1'>
    
      
		<title>RatedTV | Home</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->




	</head>

    <div class="back"></div>
	<body >


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
							<li class="menu-item current-menu-item"><a href="Home-A.php">Home</a></li>
							<li class="menu-item m"><a href="Addmovie-A.php">Add movie</a></li>
							<li class="menu-item"><a href="logout.php" ><span style="color:#ef5350;">Logout</span></a></li>
							<li class="menu-item"><a href="profile-A.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul>  <!-- .menu -->

					</div>
				
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">

						</div>
						<div class="movie-list">
							<?php 
							while($movie=mysqli_fetch_assoc($movies)){
								
									$poster=$movie['poster'];
								
							?>
							<div class="movie">
								<figure class="movie-poster"><img src= "<?php echo $poster?>" alt="#"></figure>
								<div class="movie-title">
									
							<a href="single-A.php?id=<?php echo $movie['movieId'];?>" ><?php echo $movie["title"];?></a>
							        
								</div>

							</div>
							
<?php }; ?>

						</div> <!-- .movie-list -->

						
					</div>
				</div> <!-- .container -->
			</main>
			
		</div>
		<!-- Default snippet for navigation -->
		


		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
		
		
	</body>


</html>