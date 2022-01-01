<?php
class Users
{
    private $db;


    function __construct($conn)
    {
        $this->db = $conn;
    }
    
    public function getUsers(){
        try {
            $sql = "SELECT * FROM users";
        $results = $this->db->query($sql);
        return $results;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

}
