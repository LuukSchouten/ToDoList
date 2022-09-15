<?php 

// Get all rows from task table
$tasks_query = $conn->query("SELECT * FROM tasks");

//get all rows from task_part table
$task_part_query = $conn->query("SELECT * FROM task_part");

?>

<table>
    <tr>
        <th>Taakomschrijving</th>
        <th>Deadline</th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>


    <!-- the problem is that this loops only 2 times but it needs to loop more for the other loop to work -->
    <!-- Loop through all rows from tasks table -->
    <?php while ($task = $tasks_query->fetch()){ 

        //convert to european date format
        $date = strtotime($task['deadline']);

        $EuroDate = date('d-m-Y', $date);
        ?>

        <!-- Create a new table row for each row in the tasks table and insert data -->
        <tr>
            <td><?php echo $task['description']; ?></td>
            <td><?php echo $EuroDate; ?></td>
            <td><a href="update.php?id=<?php echo $task['id']; ?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $task['id']; ?>">Verwijderen</a></td>
        </tr>

        
        <?php while($task_part = $task_part_query->fetch()) {
                if($task_part['task_id'] == $task['id']){?> <tr><td> <?php echo $task_part['name']; ?> </td></tr> <?php 
            }}?>
    
    <?php }?>

</table>    

