<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>

<div class='main'>
<link rel="stylesheet" type=text/css href="css/index.css">

    <h2>Taak toevoegen</h2>
    <form method='post' action='createTask.php?id=<?php echo $id?>'>
        <input type='text' placeholder='Taak naam' name='name' required><br>
        <input type='time' name='duration' required><br>
        <select name='status'>
            <br>
            <option value='ToDo'> ToDo </option>
            <option value='Finished'> Finished </option>
        </select>
        <br>
        <input type='submit' name='submit' value='Toevoegen'><br>
    </form>
    <br>

    <h2> filters </h2>
    <form method='get'>
        <input hidden name='id' value='<?=$id?>'>
        status:
        <select name='status' style='margin-right: 1em;'>
            <br>
            <option value='ToDo'> ToDo </option>
            <option value='Finished'> Finished </option>
        </select>

        duration:
        <input type='time' name='duration' step='1' required style='margin-right: 1em;'>

        <input type='submit' value='filteren'><br>

    </form>



<?php

include 'connection.php';

// Get all data where id matches url id
$list = $conn->query("SELECT * FROM tasks WHERE id = $id");

$list = $list->fetch();

echo '<h2>Taken van ' . $list['description'] , ':</h2>'
?>

<?php 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

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

$url = 'http://localhost:8080/task.php';

// Get all rows from task table
$tasks = $conn->query("SELECT * from task_part where task_id = '$id' && status = '$status' && duration <= '$duration'");
?>

<table>

    <tr>
        <th>Taak</th>
        <th>Duration</a></th>
        <th>Status</a></th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>

<?php  while ($task = $tasks->fetch()){ ?>

        <tr>
            <td><?php echo $task['name']; ?></a></td>
            <td><?php echo $task['duration']; ?></td>
            <td> <?php echo $task['status'];?> </td>
            <td><a href="updateTask.php?id=<?php echo $task['id']; ?>">Update</a></td>
            <td><a href="deleteTask.php?id=<?php echo $task['id']; ?>">Verwijderen</a></td>
        </tr>

<?php } ?>

</table>

</main>
