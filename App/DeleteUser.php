<?php 

require __DIR__."/../Config.php";
require __DIR__."/Crud/Delete.php";


$delete = new Delete;
$usuario = $delete->build('usuario',"where id={$_GET['id']}");

header("location:http://$root/Users.php");


?>