<?php 

if(!empty($_GET['id'])){
    
    require __DIR__."/Crud/Read.php";

    $read = new read;
    $clause['bind']= ['id'=>$_GET['id']];
    $clause['prepare'] = "WHERE id= :id";
    $cliente = $read->build('cliente',$clause);
    $cliente = $cliente['0'];
}

?>