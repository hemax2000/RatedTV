<?php

include_once('Connect.php');
session_start();
if(!isset($_SESSION['login']))
    header("location:login page.php");
	else{
if(!empty($_GET['id'])){
	$id=$_GET['id'];
	$movie=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM movies WHERE movieId=$id"));
	$re=mysqli_fetch_assoc(mysqli_query($con,"SELECT AVG(rating) AS r FROM ratings WHERE isvirtual=0 AND movieId=$id"));
	$comments=mysqli_query($con,"SELECT * FROM ratings , users WHERE ratings.movieId=$id AND ratings.userId=users.userId");
	
	if(empty($movie['poster'])||empty($movie['description'])||empty($movie['year'])||empty($movie['genres'])){
	
		$bmovie=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM  links  WHERE links.movieId=$id"));
		$key = "b6b61875c7cf972fc22e766399d39191";		
		$i=$bmovie['imdbId'];
		
		$json = file_get_contents("https://api.themoviedb.org/3/movie/tt$i?api_key=$key");
		
		$result = json_decode($json, true);
		
		$poster_path = $result["poster_path"];
		$des=$result["overview"];
		$year=$result["release_date"];
		$genres=$result["genres"];
		$pos="https://image.tmdb.org/t/p/w500$poster_path";
	}
	
}
if(!empty($_POST['submit'])){
 session_start();
$us=$_SESSION['login'];
$rate=$_POST['rate'];
$comment=$_POST['com']; 
		if(!empty($rate)){
	   mysqli_query($con,"UPDATE ratings SET rating=$rate , comment =  '$comment' , isvirtual=0 WHERE movieId=$id AND userId = $us");
	   $id=$_GET['id'];  
	   header("location:single.php?id=$id&success=Thanks!");
		}
		else{
		header("location:single.php?id=$id&error=You must rate this movie");
		}
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
                            <!--deleted-->
						</div>

						<div class="content">
							<div class="row">
								
									<figure class="movie-poster"><img width='500' src="<?php if(empty($movie['poster'])){echo $pos;}else echo $movie['poster'] ;?>" alt="#"></figure>
								
								<div class="col-md-6">
									<h2 class="movie-title"><?php echo $movie['title'] ?></h2>
									<div class="movie-summary">
										<strong>description:</strong>
										<p><?php if(empty($movie['description'])){echo $des;}else echo $movie['description']; ?> </p>
									</div>
									<ul class="movie-meta">
										<li><strong>Rating:</strong> 
<span style="font-size:300%;color:#ffaa3c;">&starf;</span> 
<span><?php  echo number_format($re['r'],2); ?> Out of 5</span>

											
										</li>
										<!-- <li><strong>Length:</strong> 98 min</li> -->
										<li><strong>Premiere:</strong> <?php if(empty($movie['year'])){echo $year;}else echo $movie['year']; ?></li>
										<li><strong>Category:</strong> <?php if(empty($movie['genres'])){echo $year;}else echo $movie['genres']; ?></li>
									</ul>
									<?php 
      if(isset($_GET['error'])){
          echo"<div class='alert alert-danger' role='alert'>".$_GET['error']."
                </div>";
      }

       if(isset($_GET['success'])){
          echo"<div class='alert alert-success' role='alert'>".$_GET['success']."</div>";
      }
?> 
									<form method="POST" action="">

						Rate it: <div id="rating">
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
						   
						   <br><br><br>
						   Comment:
						   <br>
						   <textarea rows="10" cols="70"style="background-color: #131a20;color: aliceblue;" name="com" >
							   
						   </textarea>
						   
						</div>
						<br><br>
						<input name="submit" type ="submit" class="btn btn-info" value="Send"></input>
                  </form> 	
							</div>  <!-- .row -->
						
						</div>
						<strong>Comments</strong>
						<div class="breadcrumbs">
                            <!--deleted-->
						</div>
<?php 
while($com=mysqli_fetch_assoc($comments)){
?>

<p><?php if (!empty($com['comment'])) { echo $com['comment']; ?> </p>
<p><?php echo 'by '; echo $com['username']; echo ' '.$com['rating'].' out of 5'; ?></p>
<hr>
<?php } ?>
 <?php } ?>
</div>

					
				 
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
