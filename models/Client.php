
<?php

class Client
{
    public $id;
    public $fullname;
    public $date;
    public $service;
    public $userid;

    public function __construct($id = null, $fullname = null, $date = null, $service = null, $userid = null)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->date = $date;
        $this->service = $service;
        $this->userid = $userid;
    }


    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM client";
        return $conn->query($query);
    }



    public static function getById($id, mysqli $conn)
    {
        $query = "SELECT * FROM client WHERE id=$id";

        $myObj = array();
        if ($msqlObj = $conn->query($query)) {
            while ($row = $msqlObj->fetch_array(1)) {
                $myObj[] = $row;
            }
        }

        return $myObj;
    }


    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM client WHERE id=$this->id";
        return $conn->query($query);
    }


    public function update($id, mysqli $conn)
    {
        $query = "UPDATE client set fullname = '$this->fullname',date = '$this->date'
        ,service = '$this->service' WHERE id='$id'";
        return $conn->query($query);
    }


    public static function add(Client $client, mysqli $conn)
    {
        $query = "INSERT INTO client(fullname, date, service,userid) VALUES('$client->fullname','$client->date','$client->service','$client->userid')";
        return $conn->query($query);
    }
}
