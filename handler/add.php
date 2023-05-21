<?php

require "../dbBroker.php";
require "../models/Client.php";
require "../models/User.php";

session_start();

$loggedId = $_SESSION['user_id'];


if (
    !empty($_POST['fullnameSend'])
    && !empty($_POST['dateSend']) && !empty($_POST['serviceSend'])
) {
    if(Client::getById($_POST["idsend"], $conn) == false){

    $client = new Client(null, $_POST['fullnameSend'], $_POST['dateSend'], $_POST['serviceSend'], $loggedId);
    $status = Client::add($client, $conn);

    if ($status) {
        echo "Client saved successfully!";
    } else {
        echo "Unable to save client!";
    }
} else {
    $status = Client::update($_POST["idsend"], $_POST['fullnameSend'], $_POST['dateSend'], $_POST['serviceSend'], $conn);

    if ($status) {
        echo "Client updated successfully!";
    } else {
        echo "Unable to update client!";
    }
}
} else{
    echo "Fill all fields!";
}

 ?>