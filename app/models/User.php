<?php
include_once "../app/core/database.php";


class User extends Db
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;


    public function setUser($firstname, $lastname, $email, $password)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }


    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }


    public function getLastname()
    {
        return $this->lastname;
    }


    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function createUser()
    {
        $sqlsignup = "INSERT INTO users (firstname , lastname , email , password, role_id) VALUES (? , ? , ? , ? , ?)";
        $stmtsignup = $this->connect()->prepare($sqlsignup);
        return $stmtsignup->execute([$this->firstname, $this->lastname, $this->email, $this->password, 2]);
    }


    public function signUser($email, $password)
    {
            $sqlsignin = "SELECT * FROM users WHERE email = ? AND password = ?";
    
            $stmt = $this->connect()->prepare($sqlsignin);
    
            $stmt->execute([$email, $password]);
    
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}
