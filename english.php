<?php
require('headers.php');
require('functions.php');

try{
    $db = getDbConn();
    selectAsJson($db, "SELECT * FROM EnglishMovies");
}catch(PDOException $e){
    echo '<br>'.$e->getMessage();
}