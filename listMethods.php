<?php 

include 'Connection.php';

//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

//Create
function createList(){

    GLOBAL $conn;

    if(isset($_POST['submit'])){

        $description = $_POST['description'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];
    
        $query = "INSERT INTO tasks (description, deadline, status) VALUES ('$description', '$deadline', '$status')";
        $conn->exec($query);
    
        // prevent multiple injections on refresh by going back to index
        header("Location: index.php");
    }

}

//Read

function readList(){
    GLOBAL $conn;

    $list = $conn->query("SELECT * FROM tasks");

    return $list;

}

//Update

function updateList(){

    GLOBAL $conn;

    GLOBAL $id;

    // Get all data where id matches url id
    $select = $conn->query("SELECT * FROM tasks WHERE id = $id");
    $row = $select->fetch();

    // On submit update data
    if(isset($_POST['submit'])) {

        $description = $_POST['description'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];

        // Update query
        $query = "UPDATE tasks SET description = '$description', deadline = '$deadline', status = '$status' WHERE id = $id";

        // Prepare statement to prevent sql injection
        $stmt = $conn->prepare($query);

        // Execute query
        $stmt->execute();

        // Back to index to prevent multiple injections
        header("Location: index.php");

        }

        return $row;
}

//Delete

function deleteList(){

    GLOBAL $conn;

    GLOBAL $id;

    // DELETE query to delete row from database
    $query = "DELETE FROM tasks WHERE id=$id";

    // Prepare statement to prevent sql injection
    $stmt = $conn->prepare($query);

    // Execute query
    $stmt->execute();

    // Back to index to prevent multiple injections
    header("location: index.php");
}

