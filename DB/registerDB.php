<?php
session_start();

class Register
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function register($firstname, $lastname, $email, $username, $contactno, $password)
    {
        try {

            $isEmail = $this->getEmail($email);
            if ($isEmail['num']) {
                $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">This Email is already Register</div>';
                
                header("Location: ../register.php");
                return;
            }

            $isEmail = $this->getUsername($username);
            if ($isEmail['num']) {
                $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">This Username is already Register</div>';
                header("Location: ../register.php");
                return;
            }

            $sql = "INSERT INTO users (firstname, lastname, email, username, contactNo, password) VALUES (:firstname, :lastname, :email,:username, :contactNO, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':firstname', $firstname);
            $stmt->bindparam(':lastname', $lastname);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':contactNO', $contactno);
            $stmt->bindparam(':password', $password);

            $stmt->execute();

            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">User Register login Now</div>';
            header("Location: ../register.php");
            return;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

    public function getEmail($email)
    {
        try {
            $sql = "SELECT count(*) as num FROM users WHERE email=:email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public function getUsername($username)
    {
        try {
            $sql = "SELECT count(*) as num from users where username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            // echo $result[];
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
}
