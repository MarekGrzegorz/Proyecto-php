<?php
class DB{
    protected string $dbhost    = "localhost";
    protected string $dbuser    = "root";
    protected string $dbpass    = "123";
    protected string $db        = "Space";
    protected $conn;
    public function __construct ()  {}
    public function __destruct  ()  { $this->conn -> close();}
    public function getConn     ()  { return $this->conn;}
    public function DBconn      ()  {
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass,$this->db);
        if (mysqli_connect_errno()){ return false; }
        else { return true;} 
    }
    public function DBexit      ()  { $this->conn -> close();}
}

?>