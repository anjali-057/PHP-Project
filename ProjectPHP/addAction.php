<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <meta name="description" content="blog">
    <meta name="robots" content="noindex, nofollow">
    <!--linking css-->
    <link rel="stylesheet" href="./css/style.css">
    <title>Add Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">
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

        <form action="add.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Blog Name</label>
                <input type="text" id="name" class="form-control form-control-lg" name="name" required>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Content</label>
                <input type="text"  id="text" class="form-control form-control-lg" name="content" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>

        <?php
        // Including the database connection file
        require_once("dbConnection.php");

        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($mysqli, $_POST['name']);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);
            $confirmPassword = mysqli_real_escape_string($mysqli, $_POST['confirmPassword']);

            // Checking for empty fields
            if (empty($name)  || empty($email)) {
                echo "<div class='alert alert-danger' role='alert'>Please fill in all fields.</div>";

                echo "<br/><a href='javascript:self.history.back();' class='btn btn-secondary'>Go Back</a>";
            } else {

                // Inserting data into the database
                $result = mysqli_query($mysqli, "INSERT INTO users (`name`, `email`,`password`, `confirmPassword`) VALUES ('$name', '$email','$password', '$confirmPassword')");

                // Displaying success message
                echo "<div class='alert alert-success' role='alert'>Data added successfully! <a href='index.php' class='btn btn-primary'>View Result</a></div>";
            }
        }
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ePyVfWM50l5QbWW4Ib3cu9o9axYPypAaGQc7PpC5z9HSyO8FDCZ2IfoGqrY9NbZc" crossorigin="anonymous"></script>
</body>
</html>
