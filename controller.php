<?php
    require_once 'model.php';

    class Controller
    {
        public $model;

        function __construct()
        {
            $this->model=new Model();
        }
    }


    $controller=new Controller();

    var_dump($controller->model->getProducts());






















?>