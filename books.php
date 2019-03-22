<?php ob_start();

// authentication check
require_once('auth.php');

// set the page title
$page_title = null;
$page_title = 'Books';

// embed the header
require_once('header.php');

// connect
require_once('db.php');

// write the sql query
$sql = "SELECT * FROM books";

// execute the query and store the results
$cmd = $db->prepare($sql);
$cmd->execute();
$books = $cmd->fetchAll();

// start the html display table
echo '<a href="book.php" title="Add a New Book">Add a New Book</a>
<table class="table table-striped table-hover"><thead><th>Title</th><th>Year</th><th>Author</th><th>URL</th>
<th>Edit</th><th>Delete</th></thead><tbody>';

// loop through the results and show each movie in a new row and each value in a new column
foreach ($books as $book) {
	echo '<tr><td>' . $book['title'] . '</td>
		<td>' . $book['year'] . '</td>
		<td>' . $book['author'] . '</td>
		<td><a href="' . $book['url'] . '">' . $book['url'] . '</a></td>
		<td><a href="book.php?book_id=' . $book['movie_id'] . '">Edit</a></td>
		<td><a href="delete-book.php?book_id=' . $book['book_id'] . '" 
			onclick="return confirm(\'Are you sure you want to delete this movie?\');">Delete</td></tr>';
}

// close the table and body
echo '</tbody></table>';

// disconnect
$db = null;

// embed footer
require_once('footer.php');
ob_flush();
?>

