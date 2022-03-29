<?php


function getGallery(){
//    return array_splice(scandir($path), 2);
    return getAssocResult("SELECT * FROM `images`ORDER BY `likes` DESC ");

}
//
function getOneImage(int $id){
    return getAssocResult("SELECT * FROM `images` WHERE id = {$id}")[0]['filename'];
}
//
function addLikes(int $id){
   return executeQuery("UPDATE `images` SET `likes` = `likes` + 1 WHERE id={$id}" );
}



function loadImage(){




if(isset($_POST['load'])){
    $path_big = IMG_BIG . $_FILES["image"]["name"];
    $path_small = IMG_SMALL . $_FILES["image"]["name"];

//    //Проверка на тип файла
//    $imageinfo = getimagesize($_FILES['image']['tmp_name']);
//    if ($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
//        echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
//        exit;
//    }
//
//    //Проверка расширения файла
//    $blacklist = array(".php", ".phtml", ".php3", ".php4");
//        foreach ($blacklist as $item) {
//            if (preg_match("/$item\$/i", $_FILES['image']['name'])) {
//                header("Location: /?page=gallery&status=error1");
//                die();
//                echo "Загрузка php-файлов запрещена!";
//                exit;
//            }
//        }
//
////Проверка существует ли файл
//        if (file_exists($imageinfo)) {
//            header("Location: /?page=gallery&status=error3");
//            die();
//            echo "Файл $imageinfo существует, выберите другое имя файла!";
//            exit;
//        }
//        //Проверка на размер файла
//        if ($_FILES["image"]["size"] > 516 * 1 * 516) {
//            header("Location: /?page=gallery&status=error2");
//            die();
//            echo("Размер файла не больше 5 мб");
//            exit;
//        }

//        if( move_uploaded_file($_FILES['image']['tmp_name'], $path_big)){
//
//            $item= mysqli_real_escape_string(getDb(),$_FILES['image']['name']);
//            executeQuery("INSERT INTO `images` (`filename`) VALUES (`$item`)");
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $path_big)) {

        $item = mysqli_real_escape_string(getDb(),$_FILES['image']['name']);
        mysqli_query(getDb(),"INSERT INTO `images` (`filename`) VALUES ('$item')");

//resize images
            $image = new SimpleImage();
            $image->load($path_big);
            $image->resizeToWidth(150);
            $image->save($path_small);

            header("Location: /gallery");

            die();
        }
        else {
            echo "error";

        }

}}



