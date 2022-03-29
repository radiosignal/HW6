<?php
//Open connection to DB
function getDb() {
    static $db = null;
    if (is_null($db)) {
        $db = @mysqli_connect(HOST,USER, PASS,DB) or die("Could not connect: " . mysqli_connect_error());
    }
    return $db;
}
// function to close connection
function closeDb(){
    return mysqli_close(getDb());
}

// Get query from DB
function getAssocResult($sql) {

    $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));

    $array_result = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $array_result[] = $row;
    }

    return $array_result;
}

function getOneResult($sql) {
    $result = @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_fetch_assoc($result);
}

function executeSql($sql) {
    @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_affected_rows(getDb());
}
function executeQuery($sql)
{

   @mysqli_query(getDb(), $sql) or die(mysqli_error(getDb()));
    return mysqli_affected_rows(getDb());
}