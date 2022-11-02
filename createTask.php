<?php 

include 'connection.php';

//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $status = $_POST['status'];

    $query = "INSERT INTO task_part (task_id, name, duration, status) VALUES ('$id', '$name', '$duration', '$status')";
    $conn->exec($query);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}