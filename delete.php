<?php 

include 'connection.php';

// Put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// DELETE query to delete row from database
$query = "DELETE FROM tasks WHERE id=$id";

// Prepare statement to prevent sql injection
$stmt = $conn->prepare($query);

// Execute query
$stmt->execute();

// Back to index to prevent multiple injections
header("location: index.php");

?>