<?php

//incudes all conf's switches from root directory C:/OpenServer/domains/shop/public

include $_SERVER['DOCUMENT_ROOT']."/../config/config.php";



//if exists searchable source page so to get it, otherwise goto index.php


$url_array = explode('/', $_SERVER['REQUEST_URI']);


if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}


$params = prepareVariables($page);


//
//if (isset($_GET['page'])) {
//    $page = $_GET['page'];
//}
//else $page = 'index';
////Short version
//$page = $_GET['page'] ?? "index";
//


//Determine  variables array for pages
//$params = [];
//$layout = 'layout';
// switching between pages
//$params ['layout']='layout';
////index
//switch ($page) {
//    case 'index':
//        $params['title'] = 'Главная';
//        $params['name'] = 'Buyer';
//        header("/?page=main");
//        break;
//
//// Gallery
//    case 'gallery':
//
//        if (isset($_POST['load'])) {
//            loadImage();
//            header("/gallery");
//        }
//
//        $params ['layout'] = 'gallery';
//        $params['gallery'] = getGallery(IMG_BIG);
//
//
//
//        break;
//
//
//        // News
//
//    case 'news':
//        $params['news'] = getNews();
//
//        break;
//
//    // OneNews
//
//    case 'onenews':
//        $id = (int)$_GET['id'];
//        $params['news'] = getOneNews($id);
//        _log($params);
//        break;
//
//
//// Docs
//    case 'bux':
//         if (isset($_POST['loaddoc'])) {
//            upload();
//            header("/bux");
//        die();
//        }
//        $params ['layout']= 'bux';
//        $params['title'] = 'Бухи';
//        $params['message'] = $status[$_GET['status']];
//        $params['files'] = getFiles(IMG_DOC);
//        _log($params);
//        break;
//
////Catalog
//
//    case 'catalog':
//        $params['title'] = 'Каталог';
//        $params['catalog'] = getCatalog();
//        break;
//
////About us
//
//    case 'about':
//        $params['title'] = 'about';
//        $params['phone'] = 444333;
//        break;
//
////
//
//    case 'apicatalog':
//        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
//        die();
//
////Default appearance
//    default:
//        echo "404";
//        die();
//}

//Render contents


echo render($page, $params );