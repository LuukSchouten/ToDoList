<?php 

include 'listMethods.php';

$row = updateList();

?>

<form method='post'>
    <input type='text' name='description' value='<?php echo $row['description']; ?>'><br>
    <input type='date' name='deadline' value='<?php echo $row['deadline']; ?>'><br>
    <select name='status'>
            <br>
            <option value='ToDo'> ToDo </option>
            <option value='Finished'> Finished </option>
        </select>
        <br>
    <input type='submit' name='submit' value='Updaten'><br>
</form>