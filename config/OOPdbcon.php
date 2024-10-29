<!-- Low Zhi Lok & Lee Kai Mun -->
<?php 

class OOPdbcon{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($conn->connect_error){
            die("<h1>Database Connection Failed</h1>");
        }
        return $this->conn = $conn;
    }
}

?>
