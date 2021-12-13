<?php
require_once('headers.php');
require_once('functions.php');

$json = json_decode(file_get_contents('php://input'));

$search = filter_var($json->search, FILTER_SANITIZE_STRING);

$db = getDbConn();
$sql = "SELECT primary_title, genre FROM titles INNER JOIN title_genres
ON titles.title_id = title_genres.title_id
WHERE genre LIKE '%$search%' OR primary_title LIKE '%$search%'
LIMIT 10";

$prepared = $db->prepare($sql);
$prepared -> execute();

$rows = $prepared->fetchAll();

$results = '<h3>Top 10 movies from Shorts</h3>';
$results .= '<ul>';

foreach($rows as $row){
    $results .= '<li>' . $row["primary_title"]. ', ' . $row["genre"] . '</li>';
}

$results .= '</ul>';

echo $results;