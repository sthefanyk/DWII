<?php
    namespace app\controllers;
    use app\database\models\Student;
    class StudentController {
        private $student;
        public function __construct() {
            $this->student = new Student();
        }
        public function read() {
            return json_encode($this->student->all());
        }
        public function monitor() {
            return json_encode($this->student->monitor());
        }
        public function create($data) {
            return json_encode($this->student->create($data['nome'], $data['turma']));
        }
        public function update($data) {
            return json_encode($this->student->update($data['id'], $data['nome'], $data['turma']));
        }
        public function delete($data) {
            return json_encode($this->student->delete($data['id']));
        }
        public function read_array() {
            return $this->student->all();
        }

        public function monitor_array() {
            return $this->student->monitor();
        }
    }
