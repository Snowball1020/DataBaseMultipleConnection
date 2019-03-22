<?php ob_start();

// auth check
require_once('auth.php');

// save form inputs into variables
$book_id = $_GET['book_id'];

// connect to the database
require_once('db.php');

// set up the SQL DELETE command to remove the selected book
$sql = "DELETE FROM books WHERE book_id = :book_id";

	
// create a command object and fill the parameters with the book_id value
$cmd = $db->prepare($sql);
$cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);

// execute the command
$cmd->execute();

// disconnect from the database
$db = null;

// redirect to updated books.php 
header('location:books.php');

require_once('footer.php');
ob_flush(); ?>