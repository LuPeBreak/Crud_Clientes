<?php 

require __DIR__."/../Config.php";
require __DIR__."/Crud/Update.php";

$update = new Update;

$data = [
    "nome" => $_POST["nome"],
    "login" =>$_POST["login"],
    "senha" =>$_POST["senha"],
];



$update->build('usuario',$data,"Where id= {$_POST["id"]}");


header("location:http://$root/Users.php");


?>