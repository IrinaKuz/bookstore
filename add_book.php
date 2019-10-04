<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add new book</title>
	<link rel="stylesheet" href="css/add_book_style.css">
</head>
<body>
	<?php
		include "blank.html";
	?>
	<div class="pg_wrapper">
		<h2>Add a new book to the catalogue</h2>
		<form action="add_book.php" method="GET">
			<label for="title">Title:</label>
			<input type="text" name="title"><br>

			<label for="author">Author:</label>
			<input type="text" name="author"><br>

			<label for="isbn">ISBN:</label>
			<input type="text" name="isbn"><br>

			<label for="description">Description:</label>
			<input type="text" name="description"><br>

			<label for="publ_date">Publish day:</label>
			<input type="text" name="publ_date"><br>

			<label for="genre">Genre:</label>
			<select name="genre">
				<option value="1">Romance</option>
				<option value="2">Fantasy</option>
				<option value="3">Sci-fi</option>
				<option value="4">Western</option>
				<option value="5">Thriller</option>
				<option value="6">Mystery</option>
				<option value="7">Biography</option>
				<option value="8">Historical fiction</option>
				<option value="9">Non-fiction</option>
				<option value="10">Textbook</option>
				<option value="11">Poetry</option>
				<option value="12">Children&apos;s literature</option>
			</select>
			<input type="submit">
		</form>
		<?php

			// open connection
			$conn = new mysqli();
			if (!$conn) {
				die("Connection is not successful " . $conn->connect_error);
			}

			if(isset($_GET['title']) && isset($_GET['author']) && isset($_GET['isbn']) && isset($_GET['description']) &&
		       isset($_GET['publ_date']) && isset($_GET['publ_date'])) {
				$title = $_GET['title'];
				$author = $_GET['author'];
				$isbn = $_GET['isbn'];
				$description = $_GET['description'];
				$publ_date = $_GET['publ_date'];
				$genre = $_GET['genre'];

				$sql = "INSERT into book(isbn, title, author, book_description, publ_date, genre_id)
					VALUES('$isbn', '$title', '$author', '$description', '$publ_date', '$genre')";

				if($conn->query($sql)) {
					echo "You successfully added a new book!";
				} else {
					echo "Error: " . $conn->error;
				}
			}

			$conn->close();
		?>
	</div>
</body>
</html>