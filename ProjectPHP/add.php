<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta name="description" content="blog">
    <meta name="robots" content="noindex, nofollow">
	<title>Add Data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
	<div class="container mt-5">

		<h2>Add Data</h2>
		
        <!--Form-->
		<form action="addAction.php" method="post" name="add">
			<table class="table table-bordered">
				<tr> 
					<td>Name</td>
					<td><input type="text" name="name" class="form-control"></td>
				</tr>
				<tr> 
					<td>Email</td>
					<td><input type="email" name="email" class="form-control"></td>
				</tr>
                <tr>
					<td>Password</td>
					<td><input type="password" name="password" class="form-control"></td>
				</tr>
                <tr>
					<td>Confirm Password</td>
					<td><input type="password" name="confirmPassword" class="form-control"></td>
				</tr>
				<tr> 
					<td></td>
					<td><input type="submit" name="submit" value="Add" class="btn btn-primary"></td>
				</tr>
			</table>
		</form>
	</div>
    <?php
    require_once("dbConnection.php");

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $content = mysqli_real_escape_string($mysqli, $_POST['content']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);

        if (empty($name) || empty($content) || empty($email)) {
            echo "<div class='alert alert-danger' role='alert'>Please fill in all fields.";

            echo "<br/><a href='javascript:self.history.back();' class='btn btn-secondary'>Go Back</a>";
        } else {

            // Inserting data into the database
            $result = mysqli_query($mysqli, "INSERT INTO blogs (`name`, `content`, `email`) VALUES ('$name', '$content', '$email')");

            // Displaying success message
            echo "<div class='alert alert-success' role='alert'>Data added successfully! <a href='index.php' class='btn btn-primary'>View Result</a></div>";
        }
    }
    ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ePyVfWM50l5QbWW4Ib3cu9o9axYPypAaGQc7PpC5z9HSyO8FDCZ2IfoGqrY9NbZc" crossorigin="anonymous"></script>
</body>
</html>
