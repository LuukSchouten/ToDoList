<div class='main'>
<link rel="stylesheet" type=text/css href="css/index.css">

<?php 
    //put url id in variable
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>

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



<?php

include 'connection.php';

// Get all data where id matches url id
$list = $conn->query("SELECT * FROM tasks WHERE id = $id");

$list = $list->fetch();

echo '<h2>Taken van ' . $list['description'] , ':</h2>'
?>

<?php 

//get status from url
if(isset($_GET['order'])) {
    $order = $_GET['order'];
}else{
    $order = 'duration';
}

if(isset($_GET['sortRow'])) {
    $sortRow = $_GET['sortRow'];
}else{
    $sortRow = 'ASC';
}


// Get all rows from task table
$tasks = $conn->query("SELECT * FROM task_part WHERE task_id = $id ORDER BY $order $sortRow");

//when order is ASC change it do DESC and vice versa
$sortRow == 'DESC' ? $sortRow = 'ASC' : $sortRow = 'DESC';

?>

<table>

    <tr>
        <th>Taak</th>
        <th><a href='?id=<?php echo $id?>&&order=duration&&sortRow=<?php echo $sortRow?>'>Duration</a></th>
        <th><a href='?id=<?php echo $id?>&&=order=status&&sortRow=<?php echo $sortRow?>'>Status</a></th>
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
