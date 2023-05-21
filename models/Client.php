
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


    public static function deleteById($clientId, mysqli $conn)
    {
        $query = "DELETE FROM client WHERE id=$clientId";
        return $conn->query($query);
    }


    public static function update($id, $fullname, $date, $service, mysqli $conn)
    {
        $query = "UPDATE client set fullname = '$fullname',date = '$date'
        ,service = '$service' WHERE id='$id'";
        return $conn->query($query);
    }


    public static function add(Client $client, mysqli $conn)
    {
        $query = "INSERT INTO client(fullname, date, service,userid) VALUES('$client->fullname','$client->date','$client->service','$client->userid')";
        return $conn->query($query);
    }

    public static function getLast(mysqli $conn)
    {
        $q = "SELECT * FROM client ORDER BY id DESC LIMIT 1";
        return $conn->query($q);
    }
}
