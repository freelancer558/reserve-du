<?php

include_once("smoothcalendar.php");

$id = $_GET['id'];

echo json_encode($calendar->getreserveById($id));

?>