<?php
require_once 'controller.php';

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