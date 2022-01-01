<?php
class Question
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addQuestion($sub_id, $question, $option01, $option02, $option03, $option04, $answer, $author)
    {
        try {
            $status = "pending";
            $sql = "INSERT INTO questionbank (sub_id, status, question, option01, option02, option03, option04, answer, author) VALUES (:sub_id, :status, :question, :option01, :option02, :option03, :option04, :answer, :author)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':sub_id', $sub_id);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':question', $question);
            $stmt->bindparam(':option01', $option01);
            $stmt->bindparam(':option02', $option02);
            $stmt->bindparam(':option03', $option03);
            $stmt->bindparam(':option04', $option04);
            $stmt->bindparam(':answer', $answer);
            $stmt->bindparam(':author', $author);

            $stmt->execute();

            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function updateQuestion($id, $question, $option01, $option02, $option03, $option04, $answer, $author)
    {
        try {
            $status = "pending";
            $sql = "UPDATE questionbank SET status=:status, question=:question, option01 =:option01, option02=:option02,option03=:option03, option04=:option04, answer=:answer, author=:author WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':question', $question);
            $stmt->bindparam(':option01', $option01);
            $stmt->bindparam(':option02', $option02);
            $stmt->bindparam(':option03', $option03);
            $stmt->bindparam(':option04', $option04);
            $stmt->bindparam(':answer', $answer);
            $stmt->bindparam(':author', $author);
            $stmt->bindparam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function deleteQuestion($id)
    {
        try {
            $sql = "DELETE FROM questionbank WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function showQuestions($sub_id)
    {
        try {
            $sql = "SELECT * FROM questionbank where sub_id=:sub_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('sub_id', $sub_id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function showQuestion($id)
    {
        try {
            $sql = "SELECT * FROM questionbank WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public function approveQuestion($id)
    {
        try {
            $status = "approved";
            $sql = "UPDATE questionbank SET status=:status WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function rejectQuestion($id)
    {
        try {
            $status = "rejected";
            $sql = "UPDATE questionbank SET status=:status WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
