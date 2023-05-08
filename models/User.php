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
        $query = "SELECT * FROM user WHERE email='$user->email' and password='$user->password'";
        return $conn->query($query);
    }

}