<?php
class DatabaseConnection {
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $username = 'root';
    private $password = ''; 
    private $database = 'applicationcaf';

    private function __construct() {
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->connection->connect_error) {
                throw new Exception('Erreur de connexion à la base de données : ' . $this->connection->connect_error);
            }
            $this->connection->set_charset('utf8mb4');
            $this->connection->query("SET sql_mode = 'STRICT_ALL_TABLES';");
        } catch (Exception $e) {
            // Gérez l'erreur ici, par exemple, redirigez vers une page d'erreur.
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
