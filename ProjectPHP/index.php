<?php
// Including the database connection file
require_once("dbConnection.php");

// Fetching data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM blogs ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta name="description" content="blog">
    <meta name="robots" content="noindex, nofollow">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Blog Website</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addAction.php">Add blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">login</a>
                </li>
            </ul>
        </div>
    </nav>

	<div class="container mt-4">
		<div class="container mt-5">
    <div class="container mt-5">
    <div class="row">
        <?php
        // Fetching the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<div class='mb-4'>";
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $res['name'] . "</h5>";
            echo "<p class='card-text'>" . $res['content'] . "</p>";
            echo "<p class='card-text'><small class='text-muted'>" .'by '. $res['email'] . "</small></p>";
            echo "<div class='d-flex justify-content-between'>";
            echo "<a class='btn btn-warning btn-sm' href=\"edit.php?id=$res[id]\">Edit</a>";
            echo "<a class='btn btn-danger btn-sm' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>

</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
