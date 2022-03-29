<?php
//absolute path
define( "ROOT", dirname(__DIR__));

define("IMG_BIG", $_SERVER['DOCUMENT_ROOT']."/gallery_img/big/");
define("IMG_SMALL", $_SERVER['DOCUMENT_ROOT']."/gallery_img/small/");
define("IMG_DOC", $_SERVER['DOCUMENT_ROOT']."/doc/");
define("IMG", $_SERVER['DOCUMENT_ROOT']."/img/");

define('TEMPLATES_DIR',ROOT. '/templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', '127.0.0.1:3309');
define('USER', 'robert');
define('PASS', '12345');
define('DB', 'shop');


include ROOT ."/engine/render.php";
include ROOT."/engine/log.php";
include ROOT."/engine/catalog.php";
include ROOT ."/engine/gallery.php";
include ROOT ."/engine/news.php";
include ROOT ."/engine/classSimpleImage.php";
include ROOT."/engine/bux.php";
include ROOT."/engine/db/db.php";
include ROOT ."/engine/feedback.php";
include ROOT ."/engine/controller.php";
