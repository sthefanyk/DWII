<?php
    header("Access-Control-Allow-Origin: *");
    require __DIR__ . '/../vendor/autoload.php';
    use app\controllers\StudentController;
    $obj = new StudentController();
    $data = $obj->create($_POST);
    //print_r($_POST['turma']);
    print_r($data);