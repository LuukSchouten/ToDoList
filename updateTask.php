<?php 

include 'taskMethods.php';

$row = updateTask();

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