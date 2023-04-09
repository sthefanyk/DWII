<?php
    namespace app\traits;
    trait Monitor {
        public function monitor($returnAll = true) {
            try {
                $query = $this->connection->query("SELECT {$this->col_turma}, COUNT({$this->col_turma}) as total FROM {$this->table} GROUP BY {$this->col_turma}");
                return $returnAll ? $query->fetchAll() : $query->fetch();
            } catch(\PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }
