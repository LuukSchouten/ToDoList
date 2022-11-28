<?php 

include 'listMethods.php';

$list = readList();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type=text/css href="css/index.css">
    <title>ToDo list</title>
</head>
<body>

<div class='main'>

    

    <h2>Lijst toevoegen</h2>
    <form method='post' action='createList.php'>
        <input type='text' placeholder='Lijst naam' name='description' required><br>
        <input type='date' name='deadline' required><br>
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

            while ($row = $list->fetch()){ 

                //convert to european date format
                $date = strtotime($row['deadline']);

                $EuroDate = date('d-m-Y', $date);
                ?>

                <!-- Create a new table row for each row in the tasks table and insert data -->

                <tr>
                    <td><a href="task.php?id=<?php echo $row['id']; ?>"><?php echo $row['description']; ?></a></td>
                    <td><?php echo $EuroDate; ?></td>
                    <td> <?php echo $row['status'];?> </td>
                    <td><a href="updateList.php?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a href="deleteList.php?id=<?php echo $row['id']; ?>">Verwijderen</a></td>
                </tr>
                
                <!-- fetch the tasks of the list with a php fetch using the list_id. -->
            
        <?php } ?>

    </table>    

</div>

</body>
</html>