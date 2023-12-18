<?php
require 'connexion.php';

class crud_dynamic{
    public function insert($table, $data) {
        // Use prepared statements to prevent SQL injection
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table($columns) VALUES($values)";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array_values($data));

            return true;
        } catch (PDOException $err) {
            die("Error in prepared statement: " . $err->getMessage());
        }
    }


    public function update($table, $data, $id){
            $setStatements = array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($data));
    
            $sql = "UPDATE $table SET " . implode(', ', $setStatements) . " WHERE id = :id";
    
            try {
                $stmt = $this->pdo->prepare($sql);
    
                // Bind parameters to the prepared statement
                foreach ($data as $key => $value) {
                    $stmt->bindValue(":$key", $value);
                }
    
                $stmt->bindValue(":id", $id);
    
                // Execute the prepared statement
                $result = $stmt->execute();
    
                return $result;
            } catch (PDOException $err) {
                die("Error in prepared statement: " . $err->getMessage());
            }
        }
    
    
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = :id";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the prepared statement
            $result = $stmt->execute();

            return $result;
        } catch (PDOException $err) {
            die("Error in prepared statement: " . $err->getMessage());
        }
    }

    public function select($mysqli, $table, $columns = "*", $where = null) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT $columns FROM $table";
    
        if ($where !== null) {
            $sql .= " WHERE $where";
        }
    
        $stmt = mysqli_prepare($mysqli, $sql);
    
        if (!$stmt) {
            die("Error in prepared statement: " . mysqli_error($mysqli));
        }
    
        // Execute the prepared statement
        mysqli_stmt_execute($stmt);
    
        // Get the result set
        $result = mysqli_stmt_get_result($stmt);
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        return $result;
    }
    public function __construct() {
        $this->pdo = Config::getPdo();
    }

    public function selectRecords($table, $columns = "*", $where = null) {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT $columns FROM $table";

        if ($where !== null) {
            $sql .= " WHERE $where";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            // Get the result set
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            die("Error in prepared statement: " . $e->getMessage());
        }
    }
}
    

    
    
    // <?php

    // require_once 'config.php';
    
    // class Database {
    //     private $conn;
    
    //     public function __construct($host, $username, $password, $database) {
           
    
    //     public function getConnection() {
    //         return $this->conn;
    //     }
    
    //     public function __destruct() {
    //         $this->conn = null;
    //     }
    // }
    
    // // Exemple d'utilisation :
    // $database = new Database($host, $username, $password, $database);
    // $pdoInstance = $database->getConnection();
    
    // // Maintenant, $pdoInstance contient l'instance PDO connectée à la base de données.
    


