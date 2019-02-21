<?php 

require __DIR__."/Crud/Read.php";

$read = new read;
$clientes = $read->build('cliente');


?>