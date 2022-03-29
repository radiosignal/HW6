<?php

function getAllFeedback(){

   $sql="SELECT * FROM `feedback`ORDER BY `id` DESC ";
   return getAssocResult($sql);

}

//$feedbacks = getFeedback();



function addFeedBack($name, $feedback){
    $name = strip_tags(htmlspecialchars(mysqli_escape_string(getDb(), $_POST['name'])));
    $feedback =  strip_tags(htmlspecialchars(mysqli_escape_string(getDb(), $_POST['feedback'])));
    $sql = "INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')";

    executeQuery($sql);
    return mysqli_insert_id(getDb());
//    mysqli_query(getDb(),$sql);
//    header('location:/feedback/?message=ok');

}

function deleteFeedback($id_feed){
    $id_feed= (int)$id_feed;
    executeQuery("DELETE FROM `feedback` WHERE id={$id_feed}");
}



function doFeedbackAction(&$params, $action ){
    $params['name']='';
    $params['text']='';
    $params['button']='Place Feedback';
    $params['action']='add';
    $params['id_feed']='';

    if($action=="add"){
        addFeedback($_POST['name'],$_POST['feedback']);
        header("Location: /feedback/?message=OK");
    }
    if($action=="delete"){
        deleteFeedback($_GET['id_feed']);
        header("Location: /feedback/?message=delete");
    }
    if($action=="edit"){
        $id_feed = (int)$_GET['id_feed'];
        $result_feedback = getAssocResult("SELECT * FROM `feedback` WHERE id= {$id_feed}");
        $params['name']=$result_feedback[0]['name'];
        $params['text']=$result_feedback[0]['feedback'];
        $params['button']='Do edit';
        $params['action']='save';
        $params['id_feed']=$id_feed;

    }
    if($action== 'save'){
        $id_feed = (int)$_POST['id_feedback'];
        $name = strip_tags(htmlspecialchars(mysqli_escape_string(getDb(), $_POST['name'])));
        $feedback =  strip_tags(htmlspecialchars(mysqli_escape_string(getDb(), $_POST['feedback'])));
        executeQuery("UPDATE `feedback` SET `name`='{$name}', `feedback`='{$feedback}' WHERE `feedback`.`id`={$id_feed};");
        header("Location: /feedback/?message=edit");
    }

    if($_GET['message']=='OK'){
        return $params['message']="Feedback added";
    }
    if($_GET['message']=='edit') $params['message']="Feedback edited";
    if($_GET['message']=='delete') $params['message']="Feedback deleted";
    if($_GET['message']=='save') $params['message']="Feedback saved";


}