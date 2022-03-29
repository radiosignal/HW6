<?php
function getFiles($path) {
    return array_splice(scandir($path), 2);
}
$uploadfile=getFiles(IMG_DOC);



function upload(){

    $status =[
       ' error1'=> 'upload prohibited! its no image',
        'error2'=> 'file exists!',
        'error3'=> 'existence of file',
        'error'=>' File is not uploaded!',
        'ok'=>'file is uploaded!',

    ];

    if (isset($_POST['loaddoc'])){
        $path_doc = IMG_DOC. $_FILES["myfile"]["name"];

     //Проверка на тип файла
//        $imageinfo = getimagesize($_FILES['image']['tmp_name']);
//        if ($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg') {
//            echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
//            exit;
//        }

        //Проверка расширения файла
        $blacklist = array(".php", ".phtml", ".php3", ".php4");
        foreach ($blacklist as $item) {
            if (preg_match("/$item\$/i", $_FILES['image']['name'])) {
                header("Location: /?page=gallery&status=error1");
                die();
                echo "Загрузка php-файлов запрещена!";
                exit;
            }
        }

//Проверка существует ли файл
        if (file_exists($imageinfo)) {
            header("Location: /?page=gallery&status=error3");
            die();
            echo "Файл $imageinfo существует, выберите другое имя файла!";
            exit;
        }
        //Проверка на размер файла
        if ($_FILES["image"]["size"] > 516 * 1 * 516) {
            header("Location: /?page=gallery&status=error2");
            die();
            echo("Размер файла не больше 5 мб");
            exit;
        }

        if( move_uploaded_file($_FILES['myfile']['tmp_name'], $path_doc)){
            $message= "ok";
            header("Location: /?page=bux&status=$message");

            die();
        }

        else {
            $message="error";
//    echo "error";

        }

    }
    $message = $status[$_GET['status']];
}


