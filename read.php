<?php 

//get status from url
if(isset($_GET['order'])) {
    $order = $_GET['order'];
}else{
    $order = 'deadline';
}

if(isset($_GET['sortRow'])) {
    $sortRow = $_GET['sortRow'];
}else{
    $sortRow = 'ASC';
}


// Get all rows from task table
$tasks_query = $conn->query("SELECT * FROM tasks ORDER BY $order $sortRow");

//get all rows from task_part table
$task_part_query = $conn->query("SELECT * FROM task_part");

//when order is ASC change it do DESC and vice versa
$sortRow == 'DESC' ? $sortRow = 'ASC' : $sortRow = 'DESC';

?>



<table>

    <tr>
        <th>Lijst</th>
        <th><a href='?=order=deadline&&sortRow=<?php echo $sortRow?>'>Deadline</a></th>
        <th><a href='?=order=status&&sortRow=<?php echo $sortRow?>'>Status</a></th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>

    <!-- the problem is that this loops only 2 times but it needs to loop more for the other loop to work -->
    <!-- Loop through all rows from tasks table -->

    
    <?php 
        while ($task = $tasks_query->fetch()){ 

            //convert to european date format
            $date = strtotime($task['deadline']);

            $EuroDate = date('d-m-Y', $date);
            ?>

            
            <!-- Create a new table row for each row in the tasks table and insert data -->

            <tr>
                <td><?php echo $task['description']; ?></td>
                <td><?php echo $EuroDate; ?></td>
                <td> <?php echo $task['status'];?> </td>
                <td><a href="updateList.php?id=<?php echo $task['id']; ?>">Update</a></td>
                <td><a href="deleteList.php?id=<?php echo $task['id']; ?>">Verwijderen</a></td>
            </tr>
            
            <?php while($task_part = $task_part_query->fetch()) {
                    if( $task_part['task_id'] == $task['id']){?> 
                    
                        <tr class='task_part'>
                            
                            <td> Taakomschrijving: <?php echo $task_part['name']; ?> </td>
                            <td> </td>
                            <td> </td>
                            <td> <a href="updateTask.php?id=<?php echo $task_part['id']; ?>">Update</a> </td>
                            <td> <a href="deleteTask.php?id=<?php echo $task_part['id']; ?>">Verwijderen</a> </td>
                        </tr> 
                    <?php 
                }}?>
        
        <?php }?>

</table>    



