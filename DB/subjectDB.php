<?php
class Subjects
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addSubject($sub_id, $subject)
    {
        try {
            $sql = "INSERT INTO subjects (sub_id,subject) values (:sub_id,:subject)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':sub_id', $sub_id);
            $stmt->bindparam(':subject', $subject);
            echo $sub_id . '  ' . $subject;
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getSubject()
    {
        try {
            $sql = "SELECT * FROM subjects";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
            // return false;
        }
    }

    public function getASubject($id)
    {
        try {
            $sql = "SELECT * FROM subjects WHERE sub_id =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam('id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function updateSubject($id, $subject, $sub_id)
    {
        try {
            $sql = "UPDATE subjects SET `subject`=:subject,`sub_id`=:sub_id WHERE `id`=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':subject', $subject);
            $stmt->bindparam(':sub_id', $sub_id);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function deleteSubject($id)
    {
        try {
            $sql = "DELETE FROM subjects WHERE id =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
        return false;
    }
}
