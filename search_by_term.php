<?php
require('headers.php');
require('functions.php');

$search = $_GET['search'];

$db = getDbConn();
$sql = "SELECT primary_title, genre FROM titles INNER JOIN title_genres
ON titles.title_id = title_genres.title_id
WHERE genre LIKE '$search%' OR primary_title LIKE '$search%'
LIMIT 20";

$prepared = $db->prepare($sql);
$prepared -> execute();

$results = $prepared->fetchAll(PDO::FETCH_ASSOC);

$results = json_encode($results);

echo $results;