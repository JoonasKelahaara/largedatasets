<?php
require('headers.php');
require('functions.php');

try{
//Tietokantayhteys
    $db = getDbConn();
//Funktio, joka hakee tietokannasta tiedot ja asettaa ne JSON muotoon. Käytetään vain, kun ei syötetä parametrejä
    selectAsJson($db, "SELECT * FROM FinnishMovies");
}catch(PDOException $e){
//Mahdolliset virheet otetaan talteen
    echo '<br>'.$e->getMessage();
}