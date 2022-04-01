<?php

//
//$id = (int)$_GET['id'];
//
//mysqli_query(getDb(), "UPDATE `images` SET likes=likes+1 WHERE id={$id}");
//$result = mysqli_query(getDb(), "SELECT * FROM `images`   WHERE id={$id}");
//
//$message ="";
//if ($result->num_rows !=0) $good = mysqli_fetch_assoc($result);
//else $message = "This goods are not present in DataBase";
//
//$row_feed = [];
//$buttonText = "Send";
//$action = "add";
//
//if($_GET['action']=='delete'){
//    $id_feed=(int)$_GET['id_feed'];
//    $result_feedback = mysqli_query(getDb(), "DELETE FROM `feedback` WHERE id={$id_feed}");
//    header("Location: ?id={$id}&message=delete");
//
//}



?>


Views:<?=$item['likes']?><br>
<img src="/gallery_img/small/<?= $item['filename'] ?>" width="500">


<!---->
<!--<h2>Feedbacks</h2>-->
<?//=$message[$_GET['message']]?>
<!--<form action="?/action--><?//=$action?><!--" method="post">-->
<!--    <input hidden type="text" name="id_image" placeholder="Your name" value="--><?//=$id?><!--"><br>-->
<!--    <input hidden type="text" name="id_feedback" placeholder="Your feedback" value="--><?//=$row['id']?><!--"><br>-->
<!--    <input type="text" placeholder="Name" name="name"  value="--><?//=$row['name']?><!--"><br>-->
<!--    <input type="text" placeholder="Feedback" name="feedback"  value="--><?//=$row['feedback']?><!--"><br>-->
<!--    <input type="submit" name="OK" value="--><?//=$buttonText?><!-->">-->
<!--</form><br>-->
<!---->
<?php //foreach ($result as $value):?>
<!--<div>-->
<!--    <b>--><?//=$value["name"]?><!--:</b>:<p>--><?//=$value["feedback"]?><!--</p><br>-->
<!--    <a href="?id=--><?//=$id?><!--&action=edit&id_feed=$value['id']?>">[edit]</a>-->
<!--    <a href="?id=--><?//=$id?><!--&action=delete&id_feed=$value['id']?>">[edit]</a>-->
<!--    </div>-->
<?php //endforeach;?>
<!---->
