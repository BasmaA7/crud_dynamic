<<?php
require 'Connexion.php';

class Crud_dynamic {
    private $pdo;

    public function __construct() {
        $this->pdo = Connexion::getPdo();// Utilisez le nouveau nom de classe Cnx ici
    }

    public function insertRecord($table, $data) {
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

    public function updateRecord($table, $data, $id) {
        $setStatements = array_map(function ($key) {
            return "$key = ?";
        }, array_keys($data));

        $sql = "UPDATE $table SET " . implode(', ', $setStatements) . " WHERE id = ?";

        try {
            $stmt = $this->pdo->prepare($sql);

            // Bind parameters to the prepared statement
            $values = array_values($data);
            $values[] = $id;
            $stmt->execute($values);

            return true;
        } catch (PDOException $err) {
            die("Error in prepared statement: " . $err->getMessage());
        }
    }

    public function deleteRecord($table, $id) {
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

    public function selectRecord($table, $columns = "*", $where = null) {
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
        } catch (PDOException $err) {
            die("Error in prepared statement: " . $err->getMessage());
        }
    }
}
