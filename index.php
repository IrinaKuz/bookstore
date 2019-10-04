<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to your bookstore!</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include "blank.html";
	?>
	<div id="search">
		<form action="index.php" method="GET">
	      <select name="search_by">
	        <span>Search by</span>
	        <!--<option value="genre">Genre</option>-->
	        <option value="author">Author</option>
	        <option value="title">Title</option>
	        <option value="isbn">ISBN</option>
	      </select>
	      	<input type="hidden" name="search">
	      	<input type="text" name="search_value">
	        <input type="submit">
	  </form>
  	</div>
	    <div class="page">
        <aside>
          <p class="add_book">
            <a href="add_book.php">Add book</a>
          </p>
          <ul>
            <li>Romance</li>
            <li>Fantasy</li>
            <li>Sci-fi</li>
            <li>Western</li>
            <li>Thriller</li>
            <li>Mystery</li>
            <li>Biography</li>
            <li>Historical fiction</li>
            <li>Non-fiction</li>
            <li>Textbook</li>
            <li>Poetry</li>
            <li>Children&apos;s literature</li>
          </ul>
        </aside>
        <main>
        	<p><a href="index.php">All books</a></p> 
        	<div id="query_result">
            <?php

        	// open connection
			$conn = new mysqli();
			if (!$conn) {
				die("Connection is not successful " . $conn->connect_error);
			}

        	if(isset($_GET['search']) && isset($_GET['search_by']) && isset($_GET['search_value'])) {
        		$item = $_GET['search_value'];
        		$category = $_GET['search_by'];

        		switch ($category) {
        			case 'author':
        				$sql = "SELECT * FROM book WHERE author ='$item'";
        				break;
        			case 'title':
        				$sql = "SELECT * FROM book WHERE title ='$item'";
        				break;
        			case 'isbn':
        				$sql = "SELECT * FROM book WHERE isbn ='$item'";
        				break;
        			default:
        				$
        				$sql = "SELECT * FROM book";
        		}
        		
        	} else {
				$sql = "SELECT * FROM book";
			}
			$result = $conn->query($sql);
			if (!$result) {
				echo "Error: " + $conn->error;
			} else {
                echo mysqli_num_rows($result) . ' result(s)';
				if ($result->num_rows > 0) {
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
			} ?>
            </div>
        </main>
      </div>
      <footer></footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
