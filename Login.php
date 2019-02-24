<?php session_start(); 
if(!empty($_SESSION['nome']) && $_SESSION['nome']){
    header("location:/");  
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Luis Felipe de Paula Costa">
    <title>H4Money</title>

    
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
        crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    
</head>

<body>
    <script>

        function validate(){

            if(document.getElementById('cpf').value == ''){
                alert('preencha o cpf por favor');
                document.getElementById('cpf').focus();
                return false;
            }
            if(document.getElementById('nome').value == ''){
                alert('preencha o nome por favor');
                document.getElementById('nome').focus();
                return false;
            }
            if(document.getElementById('cpf').value.length != 14){
                alert('preencha um cpf valido');
                document.getElementById('cpf').focus();
                return false;
            }
            if(document.getElementById('endereco').value.length >= 45){
                alert('O endereco esta muito grande, por favor utilize padroes reduzidos como R.nomedarua');
                document.getElementById('endereco').focus();
                return false;
            }
            if(document.getElementById('uf').value.length != 2){
                alert('Utilize a sigla de seu estado no campo UF. Ex: Rio de janeiro = RJ');
                document.getElementById('uf').focus();
                return false;
            }
            
        }

</script>


    <div class="container-fluid">
        <div class="row">
        

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                <div class="container">
                    <h2>Login</h2>
                    <?php
                    if(!empty($_SESSION['erro'])){
                        echo "<div class='alert alert-danger'>
                        ERRO: {$_SESSION['erro']}.
                        </div>";
                    }
                    if(!empty($_SESSION['wrongrecaptcha'])){
                        echo "<div class='alert alert-danger'>
                        ERRO: {$_SESSION['wrongrecaptcha']}.
                        </div>";
                    }

                    ?>
                    <form action="App\Login.php" method="POST" onSubmit='return validate()'>
                        <div class="form-group">
                            Login: <input class="form-control" type="text" name="login" required><br>
                            Senha: <input id='senha' class="form-control" type="password" name="senha" required><br>
                            <?php 

                                if(!empty($_SESSION['recaptcha']) && $_SESSION['recaptcha']>=5){
                                    echo "<div class='g-recaptcha' data-sitekey='6LfZkpMUAAAAAI_2pYp0J3Sx-x-VpOUYV7WI1Jx5'></div>";
                                }

                            ?>
                            
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                    <a href="/Register.php">Registrar</a>
                </div>

            </main>


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>