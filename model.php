<?php

class Model
{
    private $conn;

    function __construct(){
        $host = 'localhost';  $db = 'test_citrus';
        $user = 'root';   $pass = ''; $port=3306;
        $charset = 'utf8';
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        try{
            $this->conn = new PDO($dsn,$user,$pass,$options);
        }catch(PDOException $e){
            echo "Connection wasn't established: ".$e->getMessage();
        }
    }
    
    function selectPrepare($sql, $array_variables=[])
    {
        $stmt=$this->conn->prepare($sql);
        $stmt->execute($array_variables);
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProducts()
    {
        $sql='SELECT * FROM `products`';
        return $this->selectPrepare($sql);
    }

    public function getComments($isApproved=1)
    {
        $sql='SELECT * FROM `comments` WHERE `isApproved`= ?';
        return $this->selectPrepare($sql, [$isApproved]);
    }

    public function postComment($email,$name,$comment)
    {
        $sql='INSERT INTO `comments` (`email`, `name`, `comment`, `isApproved`) 
        VALUES (?, ?, ?, 0)';
        $this->selectPrepare($sql,[$email,$name,$comment]);
    }

    public function approveComment($id)
    {
        $sql='UPDATE `comments` SET `isApproved`= 1 WHERE `id`=?';
        $this->selectPrepare($sql,[$id]);
    }

    public function deleteComment($id)
    {
        $sql='DELETE FROM `comments` WHERE `id`=?';
        $this->selectPrepare($sql,[$id]);
    }

    public function checkCredentials($username,$password)
    {
        $sql='SELECT * FROM `admins` WHERE `username`= ?';
        $result=$this->selectPrepare($sql,[$username]);
        if(isset($result[0]['username']))
        {
            if($result[0]['password']===hash("sha384",$password)) return true;
        }
        return false;
    }
}
