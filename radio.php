<?php
require('headers.php');
require('functions.php');

// GET pyyntönä hakutermi, tulee front endistä axioksella
$search = $_GET['search'];
// Sanitoidaan hakusana, jotta käyttäjä ei voi 'hakkeroida' tietokantaan SQL injektiolla
$search = filter_var($search, FILTER_SANITIZE_STRING);
// Tietokantayhteys
$db = getDbConn();
// SQL lause, jolla haetaan elokuva käyttäjän hakusanalla
$sql = "SELECT primary_title, genre, start_year FROM titles INNER JOIN title_genres
        ON titles.title_id = title_genres.title_id
        WHERE genre = '$search'
        LIMIT 10";

//Valmistellaan ja bindataan SQL lause tietoturvan vuoksi
$prepared = $db->prepare($sql);
$prepared->execute();

// Otetaan talteen saadut tulokset JSON muotoon, jotta fronendi voi lukea ne helposti
$results = $prepared->fetchAll(PDO::FETCH_ASSOC);

$results = json_encode($results);

echo $results;