<?php
require_once('ImageCreation.php');
require_once('Manager.php');

$tagsList = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/proPhoto/tags.json', true);
$decoded = json_decode($tagsList);

$typed = (!empty($_GET['search'])) ? $_GET['search'] : null;

$searchedArray = array();
for ($i = 0; $i < count($decoded); $i++) {
    if (stripos($decoded[$i], $typed) === 0) {
        array_push($searchedArray, $decoded[$i]);
    }
}
$arrayString = implode("|", $searchedArray);

echo $arrayString;
