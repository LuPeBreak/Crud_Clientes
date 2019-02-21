<?php
require __DIR__."/Conn.php";

class Delete extends Conn{

private $table;

private $query;
private $delete;
private $conn;
private $sucess;
private $columns;

/**
 * colmns  = "coluna1,coluna2,..."
 * clause  = " WHERE id = 1 AND nome = nome "
 */
public function build($table, $clause){
    $this->table= (String) $table;
    $this->del($clause);
    return $this->sucess;
}

private function del($clause){

    $this->query = "DELETE FROM $this->table $clause";
    $this->conn = parent::connect();
    $this->delete= $this->conn->prepare($this->query);
    try{
        $this->delete->execute();
        $this->sucess = true;
    }catch(\PDOException $e){
        $this->sucess = false;
        die("ERROR: " . $e->getMessage());
    }
    
    
}


}


?>