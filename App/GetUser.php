<?php 

if(!empty($_GET['id'])){
    
    require __DIR__."/Crud/Read.php";

    $read = new read;
    $clause['bind']= ['id'=>$_GET['id']];
    $clause['prepare'] = "WHERE id= :id";
    $usuario = $read->build('usuario',$clause);
    $usuario = $usuario['0'];
}

?>