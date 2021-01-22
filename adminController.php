<?php
require_once 'controller.php';
    if(isset($_POST["id"]) and $_POST['method']=='PUT') $controller->approveComment($_POST["id"]);
    if(isset($_POST["id"]) and $_POST['method']=="DELETE") $controller->deleteComment($_POST["id"]);
    session_start();
    if(!isset($_SESSION['isAuth'])) exit('You are not authorized!');
    if(!$_SESSION['isAuth']) exit('You are not authorized!');