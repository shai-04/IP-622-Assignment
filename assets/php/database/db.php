<?php
    class DB {
        private $host = 'localhost';
        private $user = 'rgi_admin';
        private $password = 'R!chfield+2021';
        private $dbName = 'rgi_student';
        private $pdo;

        protected function __construct() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            
            try {
                $this->pdo = new PDO($dsn, $this->user, $this->password);

                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                header('Location: error.php?error=' . $e->getMessage());
                die;
            }
        }

        protected function selectRow($sql, $args = array()) {
            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($args);

                return $stmt->fetch();
            }
            catch (PDOException $e) {
                header('Location: error.php?error=' . $e->getMessage());
                die;
            }
        }

        protected function selectAllRows($sql, $args = array()) {
            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($args);

                return $stmt->fetchAll();
            }
            catch (PDOException $e) {
                header('Location: error.php?error=' . $e->getMessage());
                die;
            }
        }

        protected function query($sql, $args = array()) {
            try {
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($args);
            }
            catch (PDOException $e) {
                header('Location: error.php?error=' . $e->getMessage());
                die;
            }
        }

        public function __destruct() {}
    }
?>