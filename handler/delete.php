<?php

require "../dbBroker.php";
require "../models/Client.php";

if(isset($_POST['deletesend'])){
    $id = $_POST['deletesend'];
    $sql = Client::deleteById($id, $conn);
    if($sql != false){
        echo 1;
    }else{
        echo 0;
    }
}

?>