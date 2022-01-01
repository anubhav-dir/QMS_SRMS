<?php
class SetExam
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function addExam($subject, $status)
    {
        try {
            $sql = "INSERT INTO exam_schedule (subject, status) values (:subject,:status)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':subject', $subject);
            $stmt->bindparam(':status', $status);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
        return false;
    }

    public function getSchedule()
    {
        try {
            $sql = "SELECT * FROM exam_schedule";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
            // return false;
        }
    }

    public function deleteSchedule($id)
    {
        try {
            $sql = "DELETE FROM exam_schedule WHERE id =:id";
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

    public function updateSchedule($id,$subject,$status){
        try {
            $sql="UPDATE exam_schedule SET `subject`=:subject,`status`=:status WHERE `id`=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':subject',$subject);
            $stmt->bindparam(':status',$status);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getASchedule($id){
        try {
            $sql = "SELECT * FROM exam_schedule WHERE id =:id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam('id',$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

}
