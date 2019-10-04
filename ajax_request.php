<?php
	// open connection
	$conn = new mysqli();
	if (!$conn) {
		die("Connection is not successful " . $conn->connect_error);
	}
	// retrieve data from query string
	$genre = $_GET['genre'];
	// delete apostrophy from children's literature
	$genre = str_replace("'", "", $genre);

	// build query
	$sql = "SELECT * FROM `book` WHERE genre_id = (SELECT genre_id FROM `genre` WHERE genre_name = '$genre')";

	// execute query
	$result = $conn->query($sql);

	if(!$result) {
		die($conn->error);
	} else {
		echo mysqli_num_rows($result) . ' result(s)';
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				echo "<div class=\"book_wrapper\">
					<img>
					<h3>" . $row['title'] . "</h3>
					<h4>" . $row['author'] . " </h4>
					<p class=\"book_desc\">" . $row['book_description'] . " </p>
					<p class=\"publ_date\"> ". $row['publ_date'] . "</p>
					</div>";
			}
	}
?>