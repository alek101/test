<?php
    require_once 'model.php';

    class Controller
    {
        private $model;

        function __construct()
        {
            $this->model=new Model();
        }

        public function getProducts()
        {
            return $this->model->getProducts();
        }

        public function getComments()
        {
            return $this->model->getComments();
        }

        public function postComment($email,$name,$comment)
        {
            $this->model->postComment($email,$name,$comment);
        }
    }


    $controller=new Controller();

    // var_dump($controller->getProducts());




















