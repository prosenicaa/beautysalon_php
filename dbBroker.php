<?php

$host = 'localhost';
$username = 'andjela';
$password = 'andjela';
$db = 'beautysalon_php';

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_errno){
    die("<script>alert('Error while accessing database " . $conn->connect_error . "')</script>");
}