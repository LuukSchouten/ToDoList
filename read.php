<?php 

// Get all rows from task table
$query = $conn->query("SELECT * FROM tasks");

?>

<table>
    <tr>
        <th>Naam</th>
        <th>Taakomschrijving</th>
        <th>Deadline</th>
        <th>Update</th>
        <th>Verwijderen</th>
    </tr>

    <!-- Loop through all rows from tasks table -->
    <?php while ($row = $query->fetch()) { ?>

        <!-- Create a new row for each row in the tasks table and insert data -->
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['deadline']; ?></td>
            <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $row['id']; ?>">Verwijderen</a></td>
        </tr>


    <?php } ?>

</table>        