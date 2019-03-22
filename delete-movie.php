<?php ob_start();

// auth check
require_once('auth.php');

// save form inputs into variables
$movie_id = $_GET['movie_id'];

// connect to the database
require_once('db.php');

// set up the SQL DELETE command to remove the selected movie
$sql = "DELETE FROM movies WHERE movie_id = :movie_id";

	
// create a command object and fill the parameters with the movie_id value
$cmd = $db->prepare($sql);
$cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);

// execute the command
$cmd->execute();

// disconnect from the database
$conn = null;

// redirect to updated movies.php 
header('location:movies.php');

require_once('footer.php');
ob_flush(); ?>