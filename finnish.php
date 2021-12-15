<?php
require('headers.php');
require('functions.php');

try{
    $db = getDbConn();
    selectAsJson($db, "SELECT * FROM FinnishMovies");
}catch(PDOException $e){
    echo '<br>'.$e->getMessage();
}