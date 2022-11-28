<?php

include 'connection.php';

//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

class taskMethods{

//Create 

function createTask(){
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

}

//Update

function updateTask(){

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

}

//Delete

function deleteTask(){

    // DELETE query to delete row from database
$query = "DELETE FROM task_part WHERE id=$id";

// Prepare statement to prevent sql injection
$stmt = $conn->prepare($query);

// Execute query
$stmt->execute();

// Back to index to prevent multiple injections
header('Location: ' . $_SERVER['HTTP_REFERER']);

}

}