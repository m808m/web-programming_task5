<?php

require("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    // присваиваем id нужное значение
    $id = $_GET['id'];

    $book = $db->query("SELECT * FROM shop.items WHERE id=$id")->fetchAll(2);
    // так как возвращает массив, то выбираем его первый элемент
    $book = $book[0];

} else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST["id"];
    $img = $_POST["imgbook"];
    $name = $_POST["namebook"];
    $price = $_POST["pricebook"];
    $desc = $_POST["descbook"];
    
    $db->query("UPDATE shop.items SET `name`='$name', price='$price', img='$img', `desc`='$desc' WHERE id=$id");
    header("Location: item.php?id=" . $id);

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
    <title>Изменение товара</title>
</head>
<body>
    <h2>Изменение товара</h2>
    <div class="new__form">
    <form action="" method="POST">
        url картинки <input type="text" name="imgbook" value="<?php echo $book['img']; ?>">
        <br>
        название <input type="text" name="namebook"  value="<?php echo $book['name']; ?>">
        <br>
        описание <textarea class="update__desc" type="text"  name="descbook"  > <?php echo $book['desc']; ?> 
        </textarea>
        <br>
        цена <input type="text" name="pricebook"  value="<?php echo $book['price']; ?>">
        <br>
        <input type="hidden" name="id" value="<?php echo $book['id']; ?>">

        <button class="submit" type="submit" name="submit">Изменить</button>

        <a class="new" href="item.php?id=<?php echo $id?>">Назад</a>

    </div>



    </form>
</body>
</html>