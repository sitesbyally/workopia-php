<?php

$config = require basePath('config/db.php');
$db = new Database($config);

$id = $_GET['id'] ?? '';
// Note - the query string is user input, so if you use it in an SQL statement, it's a security vulnerability 

$params = [
  'id' => $id
];

$listing = $db->query('SELECT * FROM listings WHERE id = :id', $params)->fetch();

loadView('listings/show', [
  'listing' => $listing
]);