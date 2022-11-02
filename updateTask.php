<?php

include 'connection.php';

//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Get all data where id matches url id
$select = $conn->query("SELECT * FROM task_part WHERE id = $id");
$row = $select->fetch();

$returnId = $row['task_id'];

// On submit update data
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

?>

<form method='post'>

    <input type='text' name='name' value='<?php echo $row['name']; ?>' placeholder='Taakomschrijving' required><br>
    <input type='time' name='duration' value='<?php echo $row['duration']; ?>' required><br>
    <select name='status'>
            <br>
            <option value='ToDo'> ToDo </option>
            <option value='Finished'> Finished </option>
    </select><br>
    <input type='submit' name='submit' value='Updaten'><br>

</form><br>

