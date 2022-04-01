<?php

    $arg1 = $_POST['arg1'];
    $arg2 = $_POST['arg2'];
    if(!empty($_POST['operation'])){
        if($arg1==""&&$arg2==""){
            $result = "Input numbers";
        }
        else{
            switch ($_POST['operation']){
                case '+':
                    $result = $arg1+$arg2;
                    break;
                case '-':
                    $result = $arg1-$arg2;
                    break;
                case '*':
                    $result = $arg1*$arg2;
                    break;
                case '/':
                    if($arg2==0){
                        $result ='divide by zero is not correct operation!';
                    }
                    else{
                        $result = $arg1/$arg2;
                    }
                    break;
                default:
                    $result = 'something goes wrong!';
                    break;
            }
        }
    }


?>


<!doctype html>

<head>
    <meta charset="UTF-8">

    <title>Calc2</title>
</head>
<body>
<form action="" method="post">
    <h2>variable:1</h2>
    <input type="number" name="arg1">
    <h2>variable:2</h2>
    <input type="number" name="arg2">
    <div>
        <input type="submit" name="operation" value="+">
        <input type="submit" name="operation" value="-">
        <input type="submit" name="operation" value="*">
        <input type="submit" name="operation" value="/">

    </div>

</form>
<h1>result=<?=$result?></h1>


</body>
</html>



