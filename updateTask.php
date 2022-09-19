<?php

include 'connection.php';

//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Get all data where id matches url id
$select = $conn->query("SELECT * FROM task_part WHERE id = $id");
$row = $select->fetch();

// On submit update data
if(isset($_POST['submit'])) {

    $name = $_POST['name'];

    // Update query
    $query = "UPDATE task_part SET name = '$name' WHERE id = $id";

    // Prepare statement to prevent sql injection
    $stmt = $conn->prepare($query);

    // Execute query
    $stmt->execute();

    // Back to index to prevent multiple injections
    header("Location: index.php");

}

?>

<form method='post'>

    <input type='text' name='name' value='<?php echo $row['name']; ?>' placeholder='Taakomschrijving' required><br>
    <br>
    <input type='submit' name='submit' value='Updaten'><br>

</form><br>