<?php

include 'connection.php';

//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}


//Create 

function createTask(){
    
    GLOBAL $conn;

    GLOBAL $id;

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $duration = $_POST['duration'];
        $status = $_POST['status'];
    
        $query = "INSERT INTO task_part (task_id, name, duration, status) VALUES ('$id', '$name', '$duration', '$status')";
        $conn->exec($query);
    
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}


//Read

function readTask(){

    GLOBAL $id;

    GLOBAL $conn;
    
    //get status from url
    if(isset($_GET['status'])) {
        $status = $_GET['status'];
    }else{
        $status = 'todo';
    }
    
    if(isset($_GET['duration'])) {
        $duration = $_GET['duration'];
    }else{
        $duration = '23:59:59.9999999';
    }
    
    // Get all rows from task table
    $tasks = $conn->query("SELECT * from task_part where task_id = '$id' && status = '$status' && duration <= '$duration'");

    return $tasks;
}


//Update

function updateTask(){

    GLOBAL $conn;

    GLOBAL $id;

    // Get all data where id matches url id
    $select = $conn->query("SELECT * FROM task_part WHERE id = $id");
    $row = $select->fetch();

    $returnId = $row['task_id'];

    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $duration = $_POST['duration'];
        $status = $_POST['status'];
    
        // Update query
        $query = "UPDATE task_part SET name = '$name', duration = '$duration', status = '$status' WHERE id = $id";
    
        // Prepare statement to prevent sql injection
        $stmt = $conn->prepare($query);
    
        // Execute query
        $stmt->execute();
    
        // Back to index to prevent multiple injections
        header("Location: task.php?id=$returnId");
    }

    return $row;

}


//Delete

function deleteTask(){

    GLOBAL $conn;

    GLOBAL $id;

    // DELETE query to delete row from database
    $query = "DELETE FROM task_part WHERE id=$id";

    // Prepare statement to prevent sql injection
    $stmt = $conn->prepare($query);

    // Execute query
    $stmt->execute();

    // Back to index to prevent multiple injections
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}
