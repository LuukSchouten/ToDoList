<?php 

include 'connection.php';

if(isset($_POST['submit'])){

    $description = $_POST['description'];
    $deadline = $_POST['deadline'];

    $query = "INSERT INTO tasks (description, deadline) VALUES ('$description', '$deadline')";
    $conn->exec($query);

    // prevent multiple injections on refresh by going back to index
    header("Location: index.php");

}