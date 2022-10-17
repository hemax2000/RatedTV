
<?php 

session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
include_once('Connect.php');
$movies='';
if(!empty($_POST['submit'])){
	$ser=$_POST['search'];
	$movies=mysqli_query($con,"SELECT * FROM  movies,links  WHERE Accept=1 AND links.movieId=movies.movieId AND movies.title LIKE'%$ser%' LIMIT 16" );
}
else{
	$movies=mysqli_query($con,"SELECT * FROM  movies,links  WHERE Accept=1 AND links.movieId=movies.movieId order by movies.movieId DESC LIMIT 16");
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
            
          
           
input[type=text] {
  width: 100px;
  transition: width .35s ease-in-out;
}
input[type=text]:focus {
  width: 250px;
}
       
        
                     
</style>

		<title>RatedTV | Search</title>

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
	<body >
		

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
							<li class="menu-item"><a href="Addmovie.php">Add movie</a></li>
							<li class="menu-item current-menu-item"><a href="Search.php">Search</a></li>
                            <li class="menu-item" ><a href="logout.php"><span style="color:#ef5350;">Logout</span></a></li>
                            <li class="menu-item"><a href="profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
						</ul>  <!-- .menu -->

					</div> <!-- .main-navigation -->

				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="breadcrumbs">
						</div>
<form method="post">
<!-- <a class="btn btn-info" style="margin:8px" name="submit" ><i class="fa fa-search" style="font-size:20px; color:#fff"></i>  </a> -->
<input class="btn btn-info" style="margin:8px" name="submit" type="submit" value="Search"> </input>
<input style="background-color: #131a20;color: aliceblue;" type="text" name="search" placeholder="Search..">
                            </form>
							<br><br>
                        <div class="movie-list">
							<?php 
							
							
							// function size(){
							    // $s=8;
							    //  $i=0;
								while(($movie=mysqli_fetch_assoc($movies))){
								
									if(!empty($movie['poster'])){
										$poster=$movie['poster'];
									}
									else{
											$key = "b6b61875c7cf972fc22e766399d39191";
												
	                                     $id=$movie['imdbId'];
	                                      $json = file_get_contents("https://api.themoviedb.org/3/movie/tt$id?api_key=$key");
	
	                                   $result = json_decode($json, true);
	
	                                     $poster_path = $result["poster_path"];
	
	                                    $poster="https://image.tmdb.org/t/p/w500$poster_path";
									}
									$moid=$movie['movieId'];
									$re=mysqli_fetch_assoc(mysqli_query($con,"SELECT AVG(rating) AS r FROM ratings WHERE isvirtual=0 AND movieId=$moid"));
								?>
								<div class="movie">
									<figure class="movie-poster"><img src= "<?php echo $poster?>" alt="#"></figure>
									<div class="movie-title">
										
								<a href="single.php?id=<?php echo $movie['movieId'];?>" ><?php echo $movie["title"];?></a>
								
									</div>
									<span style="font-size:140%;color:#ffaa3c;">&starf;</span>
									<span><?php  echo number_format($re['r'],2); ?> Out of 5</span>
								</div>
												
	<?php 
	// $i++;
	
		
								// }
							}
                      
?>
                           
						  
                        </div>
						
                        	<!-- Default snippet for navigation -->
		

                            <?php 
							// if(!empty($_POST['load'])){
								// size();
							// }
							?>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
	
	</body>
<?php 
mysqli_Close($con);
} ?>

</html>
