<?php 

session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
$id=$_SESSION['login'];
include_once('Connect.php');
$s = mysqli_fetch_assoc(mysqli_query($con,"SELECT Size FROM users WHERE userId=$id"));
                                                                                                           // here we put userId----------V
$movies = mysqli_query($con,"SELECT movies.*, rating FROM movies, ratings WHERE movies.Accept=1 AND movies.movieId=ratings.movieId AND isvirtual=1 AND userId=$id
ORDER BY ratings.rating DESC");
$i=0;
	}

?>
<!DOCTYPE html>
<html lang="en";>

	<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        
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
	<body Style=" 
background-image: https://i0.wp.com/thebutlercollegian.com/wp-content/uploads/2019/03/netflix-image.jpg?w=1920&ssl=1") >
		

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
							<li class="menu-item current-menu-item"><a href="Home.php">Home</a></li>
							<li class="menu-item"><a href="Addmovie.php">Add movie</a></li>
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
						<div class="movie-list">
							<?php 
							
							while(($i<$s['Size'])&&($movie=mysqli_fetch_assoc($movies))) {
							
									$moid=$movie['movieId'];
									if(!empty($movie["poster"])){
										$poster=$movie["poster"];
										$tit=$movie["title"];
									}
									else{
										
										$Amovie=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM links WHERE movieId=$moid"));
									$key = "b6b61875c7cf972fc22e766399d39191";		
											$mo=$Amovie['imdbId'];
											
											$json = file_get_contents("https://api.themoviedb.org/3/movie/tt$mo?api_key=$key");
											
											$result = json_decode($json, true);
											
											$poster_path = $result["poster_path"];
											$tit=$result["title"];
											
											
											$poster="https://image.tmdb.org/t/p/w500$poster_path";
									}
									$re=mysqli_fetch_assoc(mysqli_query($con,"SELECT AVG(rating) AS r FROM ratings WHERE isvirtual=0 AND movieId=$moid"));
								?>	<div class="movie">
								<figure class="movie-poster"><img src="<?php echo $poster; ?>" alt="#"></figure>
								<div class="movie-title"><a href="single.php?id=<?php echo $moid; ?>"><?php if (empty($movie["title"])) echo $tit; else echo $movie["title"]; ?></a></div>
								<span style="font-size:150%;color:#ffaa3c;">&starf;</span>
								<span><?php  echo number_format($re['r'],2); ?> Out of 5</span>
								</div>
								<?php 
								$i++;
							} ?>
							
							

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
    <?php mysqli_close($con); ?>
</html>