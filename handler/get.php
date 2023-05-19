<?php

require "../dbBroker.php";
require "../models/Client.php";


$getClients = Client::getAll($conn);
$data = array();
if($getClients->num_rows > 0){
    while($row = $getClients->fetch_assoc()){
        $data[] = $row;
    }
}

echo json_encode($data);


?>
