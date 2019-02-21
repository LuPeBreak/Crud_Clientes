<?php 

require __DIR__."/../Config.php";
require __DIR__."/Crud/Delete.php";


$delete = new Delete;
$clientes = $delete->build('cliente',"where id={$_GET['id']}");


header("location:http://$root");


?>