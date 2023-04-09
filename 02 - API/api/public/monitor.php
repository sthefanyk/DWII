<?php
    header("Access-Control-Allow-Origin: *");
    require __DIR__ . '/../vendor/autoload.php';
    use app\controllers\StudentController;
    $obj = new StudentController();
    $data = $obj->monitor();
    print_r($data);
    