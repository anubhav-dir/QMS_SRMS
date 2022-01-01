<?php
class Profile
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getProfile($username)
    {

        try {
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('username', $username);
            $stmt->execute();
            $results = $stmt->fetch();
            return $results;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
