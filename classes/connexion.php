
<?php
include "config.php";
class Connexion {
 
    protected function __construct($servername, $username, $password, $database) {
        try {
            $pdo = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $err) {
            die("Connection failed: " . $err->getMessage());
        }
    }
    public function getConnection() {
               return $this->conx;
           }
}



