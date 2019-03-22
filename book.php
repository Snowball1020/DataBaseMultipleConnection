<?php ob_start();

// authentication check
require_once('auth.php');

// set page title
$page_title = null;
$page_title = 'Book Details';

// embed the header
require_once('header.php');

// initialize variables
$book_id = null;
$title = null;
$author = null;
$year = null;
$url = null;


// check the url for a movie_id parameter and store the value in a variable if we find one
if (empty($_GET['book_id']) == false) {
	$book_id = $_GET['book_id'];

	// connect
	require_once('db.php');
	
	// write the sql query
	$sql = "SELECT * FROM books WHERE book_id = :book_id";
	
	// execute the query and store the results
	$cmd = $db->prepare($sql);
	$cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);
	$cmd->execute();
	$books = $cmd->fetchAll();
	
	// populate the fields for the selected movie from the query result
	foreach ($books as $book) {
		$title = $book['title'];
		$author = $book['author'];
		$year = $book['year'];
		$url = $book['url'];
	}
	
	// disconnect
	$db = null;
}

?>

	<div class="container">
		<h1>Book Details</h1>
	    <form method="post" action="save-book.php">
	        <fieldset class="form-group">
	            <label for="title" class="col-sm-2">Title:</label>
	            <input name="title" id="title" required value="<?php echo $title; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="year" class="col-sm-2">Year:</label>
	            <input name="year" id="year" required type="number" value="<?php echo $year; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="author" class="col-sm-2">Authot:</label>
	            <input name="author" id="author" value="<?php echo $author; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="url" class="col-sm-2">URL:</label>
	            <input name="url" id="url" required type="url" value="<?php echo $url; ?>" />
	        </fieldset>
	        <input name="book_id" type="hidden" value="<?php echo $book_id; ?>" />
	        <button type="submit" class="col-sm-offset-2 btn btn-success">Submit</button>
	    </form>
	</div>

<?php // embed footer
require_once('footer.php'); 
ob_flush(); ?>