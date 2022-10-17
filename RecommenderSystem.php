<?php

include_once('Connect.php');

function updateRS($con) {
    // this method will update the values of recommender system
    $sql="DELETE FROM ratings WHERE isvirtual=1";
    if ($con->query($sql) === TRUE) {
        // echo "Record deleted successfully";
    } else {
        // echo "Error deleting record: " . $con->error;
    }
    // echo "<br>";
    $users=mysqli_query($con,"SELECT * FROM users");
    while($user=mysqli_fetch_assoc($users)) {
        $movies=mysqli_query($con, "SELECT movieId from movies where movieId != ALL (SELECT movieId from ratings where userId=".$user["userId"].")");
        // $movies contains all movies which didn't watch by $user 
        while($movie=mysqli_fetch_assoc($movies)) {
            $avgRate=mysqli_query($con, "SELECT movieId, AVG(rating) FROM ratings WHERE isvirtual=0 AND movieId=".$movie["movieId"]." GROUP BY movieId");
            $rating=mysqli_fetch_assoc($avgRate);
            if(!empty($rating)) {
                $sql = "INSERT INTO ratings (userId, movieId, rating, isvirtual)
                VALUES (".$user["userId"].", ".$movie["movieId"].", ".$rating["AVG(rating)"].", 1)";
                if ($con->query($sql) === TRUE) {
                // echo "New record created successfully";
                } else {
                // echo "Error: " . $sql . "<br>" . $con->error;
                }
                // echo "<br>";
            }
            else { // if nobody watch $movie the virtual rating will be 0
                $sql = "INSERT INTO ratings (userId, movieId, rating, isvirtual)
                VALUES (".$user["userId"].", ".$movie["movieId"].", 0, 1)";
                if ($con->query($sql) === TRUE) {
                // echo "New record created successfully - empty";
                } else {
                // echo "Error: " . $sql . "<br>" . $con->error;
                }
                // echo "<br>";
            }
        }
        $yer = $user["pyear"];
        $movs = mysqli_query($con, "SELECT movies.* , rating FROM movies, ratings WHERE isvirtual=1 AND movies.movieId = ratings.movieId AND ratings.userId=".$user['userId']." AND movies.year = ".$yer."");
        while($mov=mysqli_fetch_assoc($movs)) {
            $sql = "UPDATE ratings SET rating = 5 WHERE movieId = ".$mov["movieId"]." AND userId = ".$user["userId"];
            if ($con->query($sql) === TRUE) {
                echo "record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            echo "<br>";
        }
        $movs = mysqli_query($con, "SELECT movies.* , rating FROM movies, ratings WHERE isvirtual=1 AND movies.movieId = ratings.movieId AND ratings.userId=".$user['userId']." AND movies.title LIKE '%$yer%'");
        while($mov=mysqli_fetch_assoc($movs)) {
            $sql = "UPDATE ratings SET rating = 5 WHERE movieId = ".$mov["movieId"]." AND userId = ".$user["userId"];
            if ($con->query($sql) === TRUE) {
                // echo "record updated successfully";
            } else {
                // echo "Error: " . $sql . "<br>" . $con->error;
            }
            // echo "<br>";
        }
    }
}
updateRS($con);
mysqli_close($con);
header("location:profile-A.php?success=Success!!");

?>