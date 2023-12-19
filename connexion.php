<?php
class Connexion {
    public static function getPdo() {
        $serveurName = 'localhost';
        $userName = 'root';
        $Password = '';
        $db = 'task_db';

        try {
            $pdo = new PDO("mysql:host=$serveurName;dbname=$db;charset=utf8mb4", $userName, $Password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Échec de la connexion : " . $e->getMessage());
        }
    }
}
