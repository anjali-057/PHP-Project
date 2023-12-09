<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Data</h2>
        <p>
            <a href="index.php" class="btn btn-secondary">Home</a>
        </p>

        <?php
        // Including the database connection file
        require_once("dbConnection.php");

        // Getting id from URL parameter
        $id = $_GET['id'];

        // Selecting data associated with this particular id
        $result = mysqli_query($mysqli, "SELECT * FROM blogs WHERE id = $id");

        // Fetching the next row of a result set as an associative array
        $resultData = mysqli_fetch_assoc($result);

        // Checking if the resultData is not empty before accessing its values
        if (!empty($resultData)) {
            $name = $resultData['name'];
            $content = $resultData['content'];
            $email = $resultData['email'];
        } else {
            echo "<div class='alert alert-danger' role='alert'>Data not found!</div>";
            exit(); // Stopping execution to prevent further errors
        }
        ?>

        <form name="edit" method="post" action="editAction.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" class="form-control" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" id="content" class="form-control" name="content" value="<?php echo $content; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ePyVfWM50l5QbWW4Ib3cu9o9axYPypAaGQc7PpC5z9HSyO8FDCZ2IfoGqrY9NbZc" crossorigin="anonymous"></script>
</body>
</html>
