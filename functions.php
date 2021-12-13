<?php
// Funktioita, joita toistetaan jatkuvasti, koodin selkeyttämiseen


// Tietokantayhteys
function getDbConn(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=imdb', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo '<br>'.$e->getMessage();
    }

    return $db;
}