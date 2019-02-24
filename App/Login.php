<?php 
    require __DIR__."/../Config.php";

    if(empty($_POST['login']) || empty($_POST['senha'])){
        header("location:http://$root/Login.php");
    }
    session_start();

    require __DIR__."/Crud/Read.php";
    require __DIR__."/Recaptcha/Recaptcha.php";

    $recaptcha=true;
    $login =$_POST['login'];
    $senha = $_POST['senha'];
    $clause = "WHERE login='{$login}' AND senha='{$senha}'";
    $read = new read;
    $usuario = $read->build('usuario',$clause);

    

   
    if(!empty($_SESSION['recaptcha']) && $_SESSION['recaptcha']>=5){
        $key = $_POST['g-recaptcha-response'];
        $recaptcha= recaptcha($key);
        $_SESSION['wrongrecaptcha']='Recaptcha incorreto';
    }

    if(count($usuario)!= 0 && $recaptcha){
        session_unset($_SESSION['erro']);
        $nome= $usuario['0']['nome'];
        $_SESSION['login']= $login;
        $_SESSION['nome']= $nome;
        header("location:http://$root");
    }else{
        $_SESSION['erro']= "Usuario ou senha invalido";
        if($_SESSION['recaptcha']== 0){
            $_SESSION['recaptcha']= 1;
        }else{
            $_SESSION['recaptcha']+= 1;
        }
        header("location:http://$root/Login.php");
    }
    
?>