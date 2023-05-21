<?php

require "../dbBroker.php";
require "../models/Client.php";

session_start();

$eid = $_POST['editsend'];
$row = Client::getById($eid, $conn);

echo json_encode($row);

?>
