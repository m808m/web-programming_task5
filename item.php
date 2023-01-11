<?php

require("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    // присваиваем id нужное значение
    $id = $_GET['id'];

    $book = $db->query("SELECT * FROM shop.items WHERE id=$id")->fetchAll(2);

    // так как возвращает массив, то выбираем его первый элемент
    $book = $book[0];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
    <title>О товаре</title>
</head>
<body>
        <div class="item">
            <img class="item__image" src="<?php echo $book['img']; ?>" alt="">
            <div class="item__name"><?php echo $book["name"];?></div>
            <div class="item__price">Цена <?php echo $book["price"];?></div>
            <div class="item__dec"><?php echo $book["desc"];?></div>
            <a class="item_but" href="update.php?id=<?php echo $book["id"]?>">Изменить</a>
            <a class="item_but" href="delete.php?id=<?php echo $book["id"]?>">Удалить</a>
        </div>

        <a class="new back" href="index.php">Список всех товаров</a>

</body>
</html>