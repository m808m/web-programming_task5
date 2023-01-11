<?php
require("db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    // введенные данные
    $img= $_POST["imgbook"];
    $name= $_POST["namebook"];
    $price= $_POST["pricebook"];
    $desc = $_POST["descbook"];

    //помещаем в таблицу
    $db->query("INSERT INTO shop.items (`name`, price, img, `desc`) VALUES ('$name','$price', '$img', '$desc')")->fetchAll(2);

    $book = $db->query("SELECT * FROM shop.items ORDER BY id DESC LIMIT 1")->fetchAll(2);
    $book = $book[0];

    header("Location: item.php?id=" . $book["id"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
    <title>Создание товара</title>
</head>
<body>
    <h2>Создание товара</h2>
    <div class="new__form">
        <form action="" method="POST">
            <input type="text" size="35" name="imgbook" placeholder="url картинки">
            <br>
            <input type="text" size="35" name="namebook" required placeholder="название">
            <br>
            <textarea class="update__desc" type="text"  name="descbook" placeholder="описание"></textarea>
            <br>
            <input type="number" min="0" type="text" name="pricebook" required placeholder="цена">
            <br>
            <button class="submit" type="submit" name="submit">Создать</button>
            
            <a class="new" href="index.php">Назад</a>
        </form>
    </div>
</body>
</html>