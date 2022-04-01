<?php





$db = @mysqli_connect('127.0.0.1:3309','robert', '12345','shop') or die("Could not connect: " . mysqli_connect_error());



$messages=[
    'ok'=>'Message created',
    'delete'=>'Message deleted',
    'edit'=>'Message edited',
    'error'=>'Error'
];
$button = 'SEND';
$action='add';


$row=[];

if($_GET['action'] =='add') {
    $name = strip_tags(htmlspecialchars(mysqli_escape_string($db, $_POST['name'])));
    $feedback =  strip_tags(htmlspecialchars(mysqli_escape_string($db, $_POST['feedback'])));
    $sql = "INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')";
//    var_dump($sql);
//    die();
    mysqli_query($db, $sql);
    header('location:/feedback/?message=ok');
    die();
    $button = "add";
    $action = "create";


}
if($_GET['action'] =='edit') {
//    var_dump($_REQUEST);
    $id = (int)$_GET['id'];
    $result = mysqli_query($db,"SELECT * FROM `feedback` WHERE `id`={$id}");
    if($result) $row=mysqli_fetch_assoc($result);
//var_dump($row);
    $button = "EDIT";
    $action = "save";

}
if($_GET['action'] == 'save') {
    $id = (int)$_POST['id'];
//    var_dump($_REQUEST);
//    die();
    $name = strip_tags(htmlspecialchars(mysqli_escape_string($db, $_POST['name'])));
    $feedback =  strip_tags(htmlspecialchars(mysqli_escape_string($db, $_POST['feedback'])));
    $sql = "UPDATE feedback SET name='{$name}', feedback='{$feedback}' WHERE id={$id}";
    mysqli_query($db, $sql);
    header('location:/feedback/?message=edit');
    die();
}
if($_GET['action'] == 'delete') {
//    var_dump($_REQUEST);
//    die();
    $id = (int)$_GET['id'];
    $result = mysqli_query($db,"DELETE FROM `feedback` WHERE `id`={$id}");

    header('location:/feedback/?message=delete');

}



$feedbacks = mysqli_query($db,"SELECT * FROM `feedback`ORDER BY `id` DESC ");

if(isset($_GET['message'])){
    $message=$messages[$_GET['message']];
}






?>


<title>Feedback</title>
</head>
<body>
<h2>Feedback</h2>
<?=$message?>
<form action="feedback.php?action=<?=$action?>"method="post">
    Put feedback: <br>
    <input  hidden type="text" name="id" value="<?=$row['id']?>"><br>
    <input type="text" name="name" placeholder="Your name" value="<?=$row['name']?>">
    <input type="text" name="feedback" placeholder="Your feedback" value="<?=$row['feedback']?>">
    <input type="submit" value="<?=$button?>>>">
</form>

<?php foreach ($feedbacks as $feedback):?>
    <div>
        <b><?=$feedback["name"]?>:</b>
        <p><?=$feedback["feedback"]?></p>
    </div>

    <a href="feedback.php?action=edit&id=<?=$feedback['id']?>">[edit]</a>
    <a href="feedback.php?action=delete&id=<?=$feedback['id']?>">[X]</a>

<?php endforeach;?>

</body>
</html>



