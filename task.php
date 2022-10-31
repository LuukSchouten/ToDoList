<?php

include 'connection.php';

//put url id in variable
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Get all data where id matches url id
$list = $conn->query("SELECT * FROM tasks WHERE id = $id");
$tasks = $conn->query("SELECT * FROM task_part WHERE task_id = $id");

$list = $list->fetch();

echo $list['description'];
?>

</br>
</br>

<?php 
    while ($task = $tasks->fetch()){
        echo $task['name'];
        echo ' ';
    }
?>
