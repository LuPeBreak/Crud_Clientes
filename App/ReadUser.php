<?php 

require __DIR__."/Crud/Read.php";

$read = new read;
$users = $read->build('usuario');


?>