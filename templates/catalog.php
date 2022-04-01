<?php
$db = @mysqli_connect(HOST,USER, PASS,DB) or die("Could not connect: " . mysqli_connect_error());
define("IMG", $_SERVER['DOCUMENT_ROOT']."/img/");

$id = (int)$_GET['id'];
//var_dump($id);
//die();

function getCatalog() {
    return mysqli_query(getDb(), "SELECT id, name, image, price FROM `goods`");
// [
//        [
//            'name' => 'Яблоко',
//            'price' => 24,
//            'image' => 'apple.jpeg'
//        ],
//        [
//            'name' => 'Пицца',
//            'price' => 1,
//            'image' => 'pizza.jpeg'
//        ],
//        [
//            'name' => 'Чай',
//            'price' => 12,
//            'image' => 'tea.jpeg'
//        ],
//    ];
}
$result = getCatalog();
//var_dump($_GET);
//die();
//$catalog = mysqli_query(getDb(), "SELECT id, name, image, price FROM `goods`");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"

    <title>Catalog</title>
</head>
<body>
<div class="post_title"><h2>Catalog</h2> </div>
<div class="catalog">



<div>
    <?php if($result):?>
        <?php foreach ($result as $item): ?>

                <a rel="catalog" href="item.php?id=<? $item['id']?>">
                    <h2> <?=$item['name']?></h2>

                <img src="/img/<?= $item['image']?>" alt="" width="150"></a><br>
                Price: <?=$item['price']?>
                <br>
                <button>Buy</button>
                <hr>

        <?php endforeach; ?>
    <?php else:?>
        Catalog is empty!
    <? endif; ?>

</div>

</body>
</html>