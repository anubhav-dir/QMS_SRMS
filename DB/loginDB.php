<?php
class Login
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function login($username, $password)
    {
        try {
            $sql="SELECT * FROM users where email = :username AND password=:password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            $stmt->bindparam(':password',$password);
           
            $stmt->execute();
            $result = $stmt->fetch();
            
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
