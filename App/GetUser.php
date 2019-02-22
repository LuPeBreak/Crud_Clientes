<?php 

if(!empty($_GET['id'])){
    
    require __DIR__."/Crud/Read.php";

    $read = new read;
    $usuario = $read->build('usuario',"WHERE id={$_GET['id']}");
    $usuario = $usuario['0'];
}

?>