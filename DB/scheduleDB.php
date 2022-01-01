<?php
class Schedule
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getExams()
    {
        try {
            $status = 'true';
            $sql = "SELECT * FROM exam_schedule where status=:status";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':status', $status);

            $stmt->execute();

            return $stmt;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
