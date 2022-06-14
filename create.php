<?php 

include 'connection.php';

if(isset($_POST['submit'])){

    $name  = $_POST['name'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];

    $query = "INSERT INTO tasks (name, description, deadline) VALUES ('$name', '$description', '$deadline')";
    $conn->exec($query);

    // prevent multiple injections on refresh by going back to index
    header("Location: index.php");

}