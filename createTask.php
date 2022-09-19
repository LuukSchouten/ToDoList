<?php 

include 'connection.php';

if(isset($_POST['submit'])){

    $task_id = $_POST['task_id'];
    $name = $_POST['name'];

    $query = "INSERT INTO task_part (task_id, name) VALUES ('$task_id', '$name')";
    $conn->exec($query);

    // prevent multiple injections on refresh by going back to index
    header("Location: index.php");

}