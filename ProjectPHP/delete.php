<?php
require_once("dbConnection.php");

$id = $_GET['id'];

// Deleting row from the database table
$result = mysqli_query($mysqli, "DELETE FROM blogs WHERE id = $id");

header("Location:index.php");
