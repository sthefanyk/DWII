<?php
    namespace app\traits;
    trait Delete {
        public function delete($id) {
            try {
                $stmt = $this->connection->prepare("DELETE FROM {$this->table} WHERE id=$id");
                return ($id) ? $stmt->execute() : false;
            } catch(\PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }
