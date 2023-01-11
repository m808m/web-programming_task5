<?php
require("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET'){$id = $_GET['id'];}

else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $db->query("DELETE FROM shop.items WHERE id=$id");
    // переход на index.php
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
    <title>Удаление товара</title>
</head>
<body>
    <h2>Удалить товар?</h2>
    <form action="" method="POST">
        <button class="submit" type="submit" name="submit">Удалить</button>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <a class="new" href="item.php?id=<?php echo $id?>">Назад</a>
    </form>
</body>
</html>