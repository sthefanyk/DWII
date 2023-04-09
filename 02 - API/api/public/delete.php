<?php
    header("Access-Control-Allow-Origin: *");
    require __DIR__ . '/../vendor/autoload.php';
    use app\controllers\StudentController;
    $obj = new StudentController();
    $data = $obj->delete($_POST);
    print_r($data);