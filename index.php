<?php 

include 'connection.php';

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
        <input type='text' placeholder='Taakomschrijving' name='description'><br>
        <input type='date' name='deadline'><br>
        <input type='submit' name='submit' value='Toevoegen'><br>
    </form><br>

    <!-- <h2>Lijst toevoegen</h2>
    <form method='post' action='create.php'>
        <input type='text' placeholder='Taakomschrijving' name='description'><br>
        <input type='date' name='deadline'><br>
        <input type='submit' name='submit' value='Toevoegen'><br>
    </form> -->

    <?php include 'read.php'; ?>

</div>

</body>
</html>