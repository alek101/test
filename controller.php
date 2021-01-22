<?php
    require_once 'model.php';

    class Controller
    {
        public $model;

        function __construct()
        {
            $this->model=new Model();
        }

        public function getProducts()
        {
            return $this->model->getProducts();
        }
    }


    $controller=new Controller();

    // var_dump($controller->getProducts());






















?>