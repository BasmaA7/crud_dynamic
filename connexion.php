
<?php

require 'config.php';
class connexion{
    protected function __construct() {
        global $servername, $username, $password, $database;
        try {
            $pdo = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $err) {
            die("Connection failed: " . $err->getMessage());
        }
    }
     public function getPdo() {
        return $this->conx;
    }
}



