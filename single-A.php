<?php

include_once('Connect.php');
session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
if(!empty($_GET['id'])){
	$id=$_GET['id'];
	$poster=mysqli_query($con,"SELECT * FROM movies WHERE movieId=$id");

	$rate=mysqli_query($con,"SELECT * FROM ratings WHERE movieId=$id ");	
	$pos=mysqli_fetch_assoc($poster);
	$rt=mysqli_fetch_assoc($rate);
}
	}
	mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		
		<title>RatedTV | Rate</title>

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
					<a href="review.html" id="branding">
						<img src="images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">RTV</h1>
							<small class="site-description">RatedTV</small>
						</div>
					</a> <!-- #branding -->
<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="Home-A.php">Home</a></li>
							<li class="menu-item"><a href="Addmovie-A.php">Add movie</a></li>
						
                            <li class="menu-item" ><a href="login%20page.php" ><span style="color:#ef5350;">Logout</span></a></li>
							<li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul> <!-- .menu -->

					</div>

					
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
                            <!--deleted-->
						</div>

						<div class="content">
							<div class="row">
								<div class="col-md-6">
									<figure class="movie-poster"><img width='500' src="<?php echo $pos['poster'] ?>" alt="#"></figure>
								</div>
								<div class="col-md-6">
									<h2 class="movie-title"><?php echo $pos['title'] ?></h2>
									<div class="movie-summary">
										<strong>description:</strong>
										<p><?php echo $pos['description']  ?> </p>
									</div>
									<ul class="movie-meta">
										<li><strong>Rating:</strong> <?php
										for($i=0;$i<$rt['rating'];$i++){?>
										<span style="font-size:200%;color:#ffaa3c;">&starf;</span> 
<?php } ?>
<span><?php echo number_format($rt['rating'],2); ?> Out of 5</span>

											<!-- <div class="star-rating" title="Rated 4.00 out of 5"><span style="width:80%"><strong class="rating">4.00</strong> out of 5</span></div> -->
										</li>
										<!-- <li><strong>Length:</strong> 98 min</li> -->
										<li><strong>Premiere:</strong> <?php echo $pos['year'] ?></li>
										<li><strong>Category:</strong> <?php echo $pos['genres'] ?></li>
									</ul>
									<strong>comment:</strong>
									<p><?php echo $rt['comment']; ?> </p>
								</div>
								
							</div> <!-- .row -->
							
						
							 <a href ="accept.php?id=<?php echo $id ?>" class="btn btn-info">Accept</a>
							 <a href ="delete.php?id=<?php echo $id ?>" class="btn btn-danger">Deny</a>
                               <!-- <button onclick='deny()' Style=" -->
                                    <!-- background-color:  #ef5350; -->
                                  <!-- border: none; box-shadow: 1px 5px 20px -5px rgba(0,0,0,0.4);  font-family:Roboto; " type="submit" name ="deny">Deny -->
                            <!-- </button> -->
										
						</div>
					</div>
                       <!-- <> -->
				</div> <!-- .container -->
            
			</main>
		
		</div>
		<!-- Default snippet for navigation -->
		
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
    </div>
</html>