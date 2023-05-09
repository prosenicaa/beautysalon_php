<?php

class User
{

    public $id;
    public $username;
    public $email;
    public $password;


    public function __construct($id = null, $username = null, $email = null, $password = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

  
    public static function loginUser($user, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE username='$user->username' and password='$user->password'";
        return $conn->query($query);
    }

    public static function registerUser($user, mysqli $conn)
    {
        $query = "SELECT * FROM user WHERE email='$user->email'";
        return $conn->query($query);
    }
    public static function addUser($user, $conn)
    {
        $query = "INSERT INTO user (username, email, password)
        VALUES ('$user->username', '$user->email', '$user->password')";
        return $conn->query($query);
    }



}