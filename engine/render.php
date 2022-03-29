<?php

function render($page, $params  ) {
    return renderTemplate(LAYOUTS_DIR .$params ['layout'], [
//        'title' => $params['title'],
        'menu' => renderTemplate('menu'),
        'content' => renderTemplate($page, $params)
    ]);
}


//$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблона']
function renderTemplate($page, $params = []) {

    /*    foreach ($params as $key => $value) {
            $$key = $value;
        }*/
    ob_start();

    if(!is_null($params))
    extract($params);


    $fileName= TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)){
        include $fileName;
    }
    else{
        Die("Page {$page} is not exists");
    }

    return ob_get_clean();
}