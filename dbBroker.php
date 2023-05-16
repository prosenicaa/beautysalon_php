<?php

$host = 'localhost';
$uname = 'andjela';
$password = 'andjela';
$db = 'beautysalon_php';

$conn = new mysqli($host, $uname, $password, $db);

if($conn->connect_errno){
    die("<script>alert('Error while accessing database " . $conn->connect_error . "')</script>");
}