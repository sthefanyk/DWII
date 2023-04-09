<?php
    namespace app\traits;
    trait Create {
        public function create($nome, $turma) {
            try {
                $stmt = $this->connection->prepare("INSERT INTO {$this->table}(nome, {$this->col_turma}) VALUES('$nome', '$turma')");
                return ($nome && $turma) ? $stmt->execute() : false;
            } catch(\PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }
