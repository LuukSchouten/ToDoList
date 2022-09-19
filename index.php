<?php 

include 'connection.php';

$select = $conn->query("SELECT * FROM tasks");

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

    <h2>Taak toevoegen</h2>
    <form method='post' action='createTask.php'>

        <select name='task_id'>
            <?php while($task = $select->fetch()){?>
                <option value="<?php echo $task['id']; ?>"><?php echo $task['description'];?></option>
            <?php }?>
        </select><br>
        <input type='text' name='name' placeholder='Taakomschrijving' required><br>
        <br>
        <input type='submit' name='submit' value='Toevoegen'><br><br>

    <?php include 'read.php'; ?>

</div>

</body>
</html>