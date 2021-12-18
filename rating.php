<?php
require('headers.php');
require('functions.php');

//Tietokantayhteys
$db = getDbConn();
//GET pyyntönä otetaan arvo frontista
$value = $_GET['value'];
//Ja sanitoidaan se
$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
//Muodostetaan SQL lause
$sql = "CALL TitleByRating($value)";
//Sanitoidaan ja bindataan 
$prepared = $db->prepare($sql);
//Lähetetään pyyntö tietokantaan
$prepared->execute();
//Otetaan kannasta saadut tiedot talteen
$result = $prepared->fetchAll(PDO::FETCH_ASSOC);
//Ja muutetaan JSON muotoon
$result = json_encode($result);
//Näytetään tulokset
echo $result;