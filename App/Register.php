<?php 

require __DIR__."/../Config.php";
require __DIR__."/Crud/Insert.php";

if(empty($_POST['login']) || empty($_POST['senha']) || empty($_POST['nome'])){
    header("location:http://$root/Register.php");
}

$insert = new insert;

$data = [
    "nome" => $_POST["nome"],
    "login" => $_POST["login"],
    "senha" => $_POST["senha"],
];


$insert->build('usuario',$data);
    
session_start();
$_SESSION['login']= $_POST['login'];
$_SESSION['nome']= $_POST["nome"];


header("location:http://$root");


?>