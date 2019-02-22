<?php 
    require __DIR__."/../Config.php";

    if(empty($_POST['login']) || empty($_POST['senha'])){
        header("location:http://$root/Login.php");
    }
    session_start();
    require __DIR__."/Crud/Read.php";

    $login =$_POST['login'];
    $senha = $_POST['senha'];
    $clause = "WHERE login='{$login}' AND senha='{$senha}'";
    $read = new read;
    $usuario = $read->build('usuario',$clause);
    

    if(count($usuario)== 0){
        $_SESSION['erro']= "Usuario ou senha invalido";
        header("location:http://$root/Login.php");
    }else{
        session_unset($_SESSION['erro']);
        $nome= $usuario['0']['nome'];
        $_SESSION['login']= $login;
        $_SESSION['nome']= $nome;
        header("location:http://$root");
    }
    
?>