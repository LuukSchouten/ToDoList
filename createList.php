<?php 

include 'connection.php';

if(isset($_POST['submit'])){

    $description = $_POST['description'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $query = "INSERT INTO tasks (description, deadline, status) VALUES ('$description', '$deadline', '$status')";
    $conn->exec($query);

    // prevent multiple injections on refresh by going back to index
    header("Location: index.php");

}