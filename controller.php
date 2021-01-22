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

        public function getComments($isApproved=1)
        {
            return $this->model->getComments($isApproved);
        }

        public function postComment($email,$name,$comment)
        {
            $this->model->postComment($email,$name,$comment);
        }

        public function approveComment($id)
        {
            $this->model->approveComment($id);
        }

        public function deleteComment($id)
        {
            $this->model->deleteComment($id);
        }

        public function checkCredentials($username,$password)
        {
            return $this->model->checkCredentials($username,$password);
        }
    }


    $controller=new Controller();

    // var_dump($controller->getProducts());




















