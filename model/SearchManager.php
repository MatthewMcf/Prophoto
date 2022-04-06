<?php
require_once('ImageCreation.php');
require_once('Manager.php');

$tagsList = file_get_contents('C:\xampp\htdocs\proPhoto\tags.json', true);
$decoded = json_decode($tagsList);

$typed = (!empty($_GET['search'])) ? $_GET['search'] : null;

$searchedArray = array();
if ($decoded) {
    for ($i = 0; $i < count($decoded); $i++) {
        if (stripos($decoded[$i], $typed) === 0) {
            array_push($searchedArray, $decoded[$i]);
        }
    }
    $arrayString = implode("|", $searchedArray);

    echo $arrayString;
} else {
    echo "No tags exist";
}
