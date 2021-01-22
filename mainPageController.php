<?php
require_once 'controller.php';
//Auth
session_start();
if(!isset($_SESSION['isAuth'])) $_SESSION['isAuth']=false;
if(isset($_POST["username"]) and isset($_POST['password']))
{
    if($controller->checkCredentials(
        $_POST["username"],$_POST["password"])
        ) 
        $_SESSION['isAuth']=true;
} 
if(isset($_POST['logout']))
{
    $_SESSION['isAuth']=false;
}
//Posting new comments
if(isset($_POST['name']) and trim($_POST['name']) !== '' 
and isset($_POST['email']) and trim($_POST['email']) !==''
and isset($_POST['comment']) and trim($_POST['comment']) !=='')
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $controller->postComment($email,$name,$comment);
}