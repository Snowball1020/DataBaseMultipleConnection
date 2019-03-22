<?php

// global database connection
		try {
			//try to connect to the database 
			$db = new PDO('mysql:host=127.0.0.1:54450;dbname=localdb', 'azure','6#vWHD_$');
			//echo a message to tell user they are connected 
			}
	
		catch(PDOException $e) {
			echo "<p> Can't connect! </p>"; 
			echo $e; 
			}
	 

?>