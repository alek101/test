<?php

class Model
{
    private $conn;

    function __construct(){
        $host = 'localhost';  $db = 'test_citrus';
        $user = 'root';   $pass = '';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        try{
            $this->conn = new PDO($dsn,$user,$pass,$options);
            // echo "Connected!";
        }catch(PDOException $e){
            echo "Connection wasn't established: ".$e->getMessage();
        }
    }
    
    function selectPrepare($sql, $niz_vr=[])
    {
        $stmt=$this->conn->prepare($sql);
        $stmt->execute($niz_vr);
        $niz=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $niz;
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
        $sql='UPDATE `comments` SET `isApproved`=1 WHERE `id`=?';
        $this->selectPrepare($sql,[$id]);
    }

    public function deleteComment($id)
    {
        $sql='DELETE FROM `comments` WHERE `id`=?';
        $this->selectPrepare($sql,[$id]);
    }
}

$model=new Model();
// var_dump($model->getProducts());
// var_dump($model->getComments());
// $model->postComment("nesto@gmail.com","nekoi","komentar");
// $model->approveComment(3);
$model->deleteComment(3);

?>