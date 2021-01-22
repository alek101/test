<?php
    require_once 'controller.php';

    if(isset($_POST['name']) and trim($_POST['name']) !== '' 
    and isset($_POST['email']) and trim($_POST['email']) !==''
    and isset($_POST['comment']) and trim($_POST['comment']) !=='')
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $comment=$_POST['comment'];
        $controller->postComment($email,$name,$comment);
        file_get_contents('index.php');
    }
    else
    {
        echo "Error";
    }


