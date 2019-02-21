<?php



require __DIR__."/Conn.php";

class Insert extends conn{

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
private $insert;
private $conn;


public function build($table, array $data){
    $this->table= (String) $table;
    $this->data = $data;
    $this->buildQuery();
    $this->create();
    return $this->success;
}

private function buildQuery(){
    //cria uma string com os nomes das colunas separadas por ","
    $columns = implode(",", array_keys($this->data));
    //cria uma string com os nomes das começando e sendo separado por : ( padrao anti injection pdo )
    $values = ':' . implode(", :", array_keys($this->data));
    //cria a query como sql, com o padrao anti injetion do pdo
    $this->query = "INSERT INTO $this->table ($columns) VALUES ($values)";
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