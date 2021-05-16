<?php 
    class User {
        private $conn;

        // User Properties
        public $id;
        public $username;
        public $password;
        public $access;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = "INSERT INTO users SET password = :password, access = :access";
            $stmt = $this->conn->prepare($query);

            // clean
            $this->password = htmlspecialchars(strip_tags($this->password));

            // hash
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':access', $this->access);

            if ($stmt->execute()) {
                return $this->conn->lastInsertId();
            }

            printf("Error Creating User: %s.\n", $stmt->error);
            return false;
        }

        public function login(){
            $query = "SELECT * FROM `users` WHERE id = :id LIMIT 0, 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row['password'];

            if (password_verify($this->password, $hashed_password)) {
                return $row['access'];
            } else {
                return false;
            }

            printf("Error: %s.\n", $stmt->error);
        }

        public function logout(){
            
        }

    }