<?php
session_start();

if(!isset($_SESSION['list'])){
    $_SESSION['list'] = [];
}

if(isset($_POST['name'])){
    $person = [];
    $person['name'] = $_POST['name'];
    $person['age'] = $_POST['age'];
    array_push($_SESSION['list'], $person);
    header('location:./');
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
<!-- CREATE form -->
<form action="" method="post">
    <input type="text" name="name">
    <input type="text" name="age">
    <input type="submit" value="Add">
</form>
<table>
  <tr>
    <th>Name</th>
    <th>Age</th>
  </tr>
  <?php foreach($_SESSION['list'] as $person){ ?>
  <tr>
    <td><?=$person['name']?></td>
    <td><?=$person['age']?></td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="edit">
            <button type="submit">Edit</button>
        </form>
    </td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="delete">
            <button type="submit">Delete</button>
        </form>
    </td>
  </tr>
  <?php } ?>
</body>
</html>