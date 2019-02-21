<?php



require __DIR__."/Conn.php";

class Update extends conn{

private $table;

/**
 * Padrao array:
 * [
 * 'coluna'=>'valor',
 * 'coluna2'=>'valor2'
 * ]
 */
private $data;

private $success;
private $query;
private $update;
private $conn;

public function build($table, array $data, $clause){
    $this->table= (String) $table;
    $this->data = $data;
    $this->buildQuery($clause);
    $this->create();
    return $this->success;
}

//constroi a query
private function buildQuery($clause){
    
    foreach($this->data as $key => $value){
        $fields[]= $key."= :".$key;
        var_dump($fields);
    }
    $set = implode(', ', $fields);
    
    //cria a query como sql, com o padrao anti injetion do pdo
    $this->query = "UPDATE $this->table SET $set $clause";
}



private function create(){
    $this->conn = parent::connect();
    $this->insert= $this->conn->prepare($this->query);
    try{
        $this->insert->execute($this->data);
        $this->success=true;
    }catch(\PDOException $e){
        $this->success=false;
        die("ERROR: " . $e->getMessage());
    }
}


}


?>