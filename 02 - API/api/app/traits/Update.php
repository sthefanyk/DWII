<?php
    namespace app\traits;
    trait Update {
        public function update($id, $nome, $turma) {
            try {
                $stmt = $this->connection->prepare("UPDATE {$this->table} SET nome ='$nome', turma='$turma' WHERE id=$id");
                return ($id && $nome && $turma) ? $stmt->execute() : false;
            } catch(\PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }
