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
        <div class="row align-items-center justify-content-center">
            <?php 
                    require __DIR__."/App/GetUser.php";
            ?>
            
                <div class="col-md-8">
                    <main role="main" class="">
                        <div class="card text-left">
                            <div class="card-header">
                                
                                    <h2 class="card-title">
                                        <?php echo !empty($usuario)? "Atualizar" :"Cadastro" ;?>
                                    </h2>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form action=<?php echo !empty($usuario)? "app/UpdateUser.php" : "App/Register.php" ;?>  method="POST" onSubmit='return validate()'>
                                        <div class="form-group">
                                            <?php 
                                            if(!empty($usuario)){   
                                                echo " <input type='hidden' name='id' value="."{$usuario['id']}". " readonly><br> ";
                                            }
                                        ?>
                                            Nome: <input id='nome' class="form-control" type="text" name="nome" value="<?php echo !empty($usuario) ? $usuario['nome'] : '' ?>"
                                                required><br>
                                            Login: <input class="form-control" type="text" name="login" value="<?php echo !empty($usuario) ? $usuario['login'] : '' ?>"
                                                required><br>
                                            Senha: <input id='senha' class="form-control" type="password" name="senha" value="<?php echo !empty($usuario) ? $usuario['senha'] : '' ?>"
                                                required><br>

                                        </div>
                                        <div class="btn-group">
                                            <input type="submit" class="btn btn-success" value="Submit">
                                            <a class="btn btn-primary" href="/Login.php">Entrar</a>
                                        
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </main>                
                </div>            
            


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

</body>

</html>