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
// Viewejä ja muita hakuja varten, joissa käyttäjä ei syötä hakuehtoa itse
function selectAsJson(object $db, string $sql): void {
    $query = $db->query($sql);                      //query funktiolla tehdään kysely kantaan
    $results = $query->fetchAll(PDO::FETCH_ASSOC);  // kannasta otetaan saatu haku 
    header('HTTP/1.1 200 OK');
    echo json_encode($results);                     // ja muutetaan JSON muotoon
}
