<?php

class Model
{
    private $conn;

    function __construct(){
        $host = 'localhost';  $db = 'baza_rentcar_v3';
        $user = 'root';   $pass = '';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        try{
            $this->conn = new PDO($dsn,$user,$pass,$options);
            // echo "Konektovan!";
        }catch(PDOException $e){
            echo "JOK: ".$e->getMessage();
        }
    }
    
    function selectPrepare($sql, $niz_vr)
    {
        $stmt=$this->conn->prepare($sql);
        $stmt->execute($niz_vr);
        $niz=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $niz;
    }
}



?>