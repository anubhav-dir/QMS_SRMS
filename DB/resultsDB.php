<?php
class Results
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getResults($username)
    {
        try {
            $sql = "SELECT * FROM results WHERE username=:username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
