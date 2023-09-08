<?php
session_start();

if(!isset($_SESSION['list'])){
    $_SESSION['list'] = [];
    $_SESSION['id'] = 1;
}

// Create
if(isset($_POST['name'])){
    $person = [];
    $person['id'] = $_SESSION['id'];
    $person['name'] = $_POST['name'];
    $person['age'] = $_POST['age'];
    array_push($_SESSION['list'], $person);
    $_SESSION['id']++;
    header('location:./');
    die;
}

// Delete
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    foreach ($_SESSION['list'] as $key => &$person){
        if($person['id'] == $_POST['id']){
            unset($_SESSION['list'][$key]);
            header('location:./');
            die;
        }
    }
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
    <input type="number" name="age" step="1">
    <input type="submit" value="Add">
</form>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
  </tr>
  <?php foreach($_SESSION['list'] as $person){ ?>
  <tr>
    <td><?=$person['id']?></td>
    <td><?=$person['name']?></td>
    <td><?=$person['age']?></td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="id">
            <button type="submit">Edit</button>
        </form>
    </td>
    <td>
        <form action="" method="post">
            <input type="hidden" name="id" value=<?=$person['id']?>>
            <button type="submit">Delete</button>
        </form>
    </td>
  </tr>
  <?php } ?>
</body>
</html>