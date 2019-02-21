<?php 


require __DIR__."/Crud/Read.php";

$read = new read;
$cliente = $read->build('cliente',"WHERE id={$_GET['id']}");
$cliente = $cliente['0'];

?>