<?php
define("IMG", $_SERVER['DOCUMENT_ROOT']."/img/");

$id = (int)$_GET['id'];


$result = mysqli_query(getDb(), "SELECT * FROM `goods` WHERE id = {$id}");
var_dump($result);
die();

$message ="";
if ($result->num_rows != 0) $good = mysqli_fetch_assoc($result);


else $message = "This goods are not present in DataBase";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>item</title>
</head>
<body>

<div id="main">
    <div class="post_title"><h2>Item</h2> </div>
    <div class="gallery">

    <?php if(empty($message)):?>
            <h2><?=$good['name']?></h2>
            <img src="/img/<?=$good['image']?>" width="150"><br>
            <p><?= $good['description']?></p>
            Price: <?=$good['price']?>
        <br>
            <button>Buy</button>
            <hr>
    <?php else:?>
    <div><?=$message?></div>
    <? endif; ?>
</div>
</div>

</body>
</html>