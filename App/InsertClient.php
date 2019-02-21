<?php 

require __DIR__."/../Config.php";
require __DIR__."/Crud/Insert.php";
require __DIR__."/ValidateClient.php";

$insert = new insert;

$data = [
    "nome" => $_POST["nome"],
    "email" =>$_POST["email"],
    "cep" =>$_POST["cep"],
    "endereco" =>$_POST["endereco"],
    "numero" =>$_POST["numero"],
    "bairro" =>$_POST["bairro"],
    "cidade" =>$_POST["cidade"],
    "uf" =>$_POST["uf"],
    "cpf" =>$_POST["cpf"]
];

//validaçao dos campos requeridos (nome e cpf)
if(!validate($data)){
    header("location:http://$root/Error.php");
    return false;
}

$insert->build('cliente',$data);


header("location:http://$root");


?>