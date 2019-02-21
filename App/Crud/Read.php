<?php
require __DIR__."/Conn.php";

class Read extends Conn{

private $table;

private $query;
private $read;
private $conn;
private $result;
private $columns;

/**
 * colmns  = "coluna1,coluna2,..."
 * clause  = " WHERE id = 1 AND nome = nome "
 */
public function build($table, $clause = null, $columns = "*"){
    $this->table= (String) $table;
    $this->columns = $columns;
    $this->retrieve($clause);
    return $this->result;
}

private function retrieve($clause){

    $this->query = "SELECT $this->columns FROM $this->table $clause";
    $this->conn = parent::connect();
    $this->read= $this->conn->prepare($this->query);
    try{
        $this->read->execute();
        $this->result = $this->read->fetchAll();
    }catch(\PDOException $e){
        die("ERROR: " . $e->getMessage());
    }
    
    
}


}


?>