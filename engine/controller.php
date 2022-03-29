<?php

function prepareVariables($page) {

//Determine  variables array for pages
$params ['layout']='layout';

// switching between pages

//index
switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        $params['name'] = 'Buyer';
        header("/");
        break;

        //image
    case 'image':
        $params ['layout'] = 'gallery';
        addLikes($_GET['id']);
//        $params ['image'] = getOneImage($_GET['id']);
//        $params['gallery'] = getGallery(IMG_BIG);
//        var_dump($params);
//        die();

        break;


// Gallery
    case 'gallery':

        if (isset($_POST['load'])) {
            loadImage();
        }

        $params ['layout'] = 'gallery';
        $params['gallery'] = getGallery(IMG_BIG);
//var_dump(  $params);
//die();

        break;

    // News
    case 'news':
        $params['news'] = getNews();

        break;

    // OneNews
    case 'onenews':
        $id = (int)$_GET['id'];
        $params['news'] = getOneNews($id);
        _log($params);
        break;
//Feedback
        case 'feedback':
             $params ['layout'] = 'bux';
             doFeedbackAction($params,$action);
             $params['feedback'] = getAllFeedback();
//        var_dump($params);
//        die();
            break;


// Docs
    case 'bux':
            if (isset($_POST['loaddoc'])) {
            upload();
            header("/bux");
            die();
            }

        $params ['layout'] = 'catalog';
        $params['title'] = 'Бухи';

        $params['files'] = getFiles(IMG_DOC);
        _log($params);
        break;

//Catalog

    case 'catalog':
        $params['layout']='layout';
        $params['title'] = 'Каталог';
//        $params['catalog'] = getCatalog();
        break;

//About us

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

//

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();

//Default appearance
    default:
        echo "404";
        die();
}
return $params;
}




