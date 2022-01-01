<?php
class Quiz
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getQuestions($sub_id)
    {
        try {
            $status = "approved";
            $sql = "SELECT * FROM questionbank WHERE sub_id=:sub_id AND status =:status";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':sub_id', $sub_id);
            $stmt->bindparam(':status', $status);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }


    public function setResults($username, $sub_id, $marks, $status)
    {

        try {
            $sql = "INSERT INTO results (username, sub_id, marks, status) VALUES (:username, :sub_id, :marks, :status)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('username', $username);
            $stmt->bindparam('sub_id', $sub_id);
            $stmt->bindparam('marks', $marks);
            $stmt->bindparam('status', $status);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
