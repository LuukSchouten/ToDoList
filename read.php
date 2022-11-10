<?php 

//get status from url
if(isset($_GET['status'])) {
    $status = $_GET['status'];
}else{
    $status = 'todo';
}

if(isset($_GET['deadline'])) {
    $deadline = $_GET['deadline'];
}else{
    $deadline = '99991231';
}

// Get all rows from task table
$tasks_query = $conn->query("SELECT * from tasks where status = '$status' && deadline <= '$deadline';");
?>

<h2> filters </h2>
<form method='get'>
    status:
    <select name='status' style='margin-right: 1em;'>
        <br>
        <option value='ToDo'> ToDo </option>
        <option value='Finished'> Finished </option>
    </select>

    deadline:
    <input type='date' name='deadline' required style='margin-right: 1em;'>

    <input type='submit' value='filteren'><br>

</form>

<br>


<table>

    <tr>
        <th>Lijst</th>
        <th>Deadline</th>
        <th>Status</a></th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>

    

    <!-- Loop through all rows from tasks table -->
    <?php

        while ($task = $tasks_query->fetch()){ 

            //convert to european date format
            $date = strtotime($task['deadline']);

            $EuroDate = date('d-m-Y', $date);
            ?>

            <!-- Create a new table row for each row in the tasks table and insert data -->

            <tr>
                <td><a href="task.php?id=<?php echo $task['id']; ?>"><?php echo $task['description']; ?></a></td>
                <td><?php echo $EuroDate; ?></td>
                <td> <?php echo $task['status'];?> </td>
                <td><a href="updateList.php?id=<?php echo $task['id']; ?>">Update</a></td>
                <td><a href="deleteList.php?id=<?php echo $task['id']; ?>">Verwijderen</a></td>
            </tr>
            
            <!-- fetch the tasks of the list with a php fetch using the list_id. -->
           
        <?php } ?>

</table>    



