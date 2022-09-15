<?php

include 'connection.php';


//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Get all data where id matches url id
$select = $conn->query("SELECT * FROM tasks WHERE id = $id");
$row = $select->fetch();

// On submit update data
if(isset($_POST['submit'])) {

    $description = $_POST['description'];
    $deadline = $_POST['deadline'];

    // Update query
    $query = "UPDATE tasks SET description = '$description', deadline = '$deadline' WHERE id = $id";

    // Prepare statement to prevent sql injection
    $stmt = $conn->prepare($query);

    // Execute query
    $stmt->execute();

    // Back to index to prevent multiple injections
    header("Location: index.php");

}

?>

<form method='post'>
    <input type='text' name='description' value='<?php echo $row['description']; ?>'><br>
    <input type='date' name='deadline' value='<?php echo $row['deadline']; ?>'><br>
    <input type='submit' name='submit' value='Updaten'><br>
</form>