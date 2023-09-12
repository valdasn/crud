<?php

include("./functions.php");
init();

// Store
if(isset($_POST['name']) && !isset($_POST['id'])){
    store();
}

// Update
if(isset($_POST['name']) && isset($_POST['id'])){
    update();
}
 
// Delete
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    destroy();
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
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){ 
    $person = find();
?>
    <!-- Update form -->
    <form action="" method="post">
        <input type="hidden" name="id" value=<?=$person['id']?>>
        <label for="name">Name</label>
        <input type="text" name="name" value=<?=$person['name']?>>
        <label for="age">Age</label>
        <input type="number" name="age" step="1" value=<?=$person['age']?>>
        <input type="submit" value="Update">
    </form>

<?php }else{ ?>

    <!-- Create form -->
    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="age">Age</label>
        <input type="number" name="age" step="1">
        <input type="submit" value="Add">
    </form>
<?php } ?>
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
        <a href="?id=<?=$person['id']?>">
            <button>Update</button>
        </a>    
    </td>
    <td>
        <!-- Delete form -->
        <form action="" method="post">
            <input type="hidden" name="id" value=<?=$person['id']?>>
            <button type="submit" name="delete">Delete</button>
        </form>
    </td>
  </tr>
  <?php } ?>
</body>
</html>