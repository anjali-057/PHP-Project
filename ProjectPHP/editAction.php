<?php
// Including the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$content = mysqli_real_escape_string($mysqli, $_POST['content']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// Checking for empty fields
	if (empty($name) || empty($content) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($content)) {
			echo "<font color='red'>content field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		// Updating the database table
		$result = mysqli_query($mysqli, "UPDATE blogs SET `name` = '$name', `content` = '$content', `email` = '$email' WHERE `id` = $id");
		
		// Displaying success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
