<?php 
  session_start();
  if(!$_SESSION['nome']){
    header("location:Login.php");  
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
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
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

    <?php require __DIR__."/component/navbar.php"; ?>

    <div class="container-fluid">
        <div class="row">
            <?php require __DIR__."/component/sidebar.php"; ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <?php 
                    require __DIR__."/App/GetClient.php";
                ?>
                <div class="container">
                    <h2><?php echo !empty($cliente)? "Atualizar cliente" :"Cadastro de clientes" ;?></h2>
                    <form action=<?php echo !empty($cliente)? "app/UpdateClient.php" :"App\InsertClient.php" ;?> method="POST" onSubmit='return validate()'>
                        <div class="form-group">
                            <?php 
                            if(!empty($cliente)){   
                                echo " <input type='hidden' name='id' value="."{$cliente['id']}". " readonly><br> ";
                            }
                            ?>
                            Nome: <input id='nome' class='form-control' type='text' name='nome' value = "<?php echo !empty($cliente) ? $cliente['nome'] : '' ?>" required><br>
                            Email: <input class="email form-control" type="email" name="email" value = "<?php echo !empty($cliente) ? $cliente['email'] : '' ?>"><br>
                            Cep: <input class='cep form-control' type="text" name="cep" value = "<?php echo !empty($cliente) ? $cliente['cep'] : '' ?>"><br>
                            Endereço: <input id='endereco' class='endereco form-control' type="text" name="endereco" value = "<?php echo !empty($cliente) ? $cliente['endereco'] : '' ?>"><br>
                            Numero: <input class='numero form-control' type="text" name="numero" value = "<?php echo !empty($cliente) ? $cliente['numero'] : '' ?>"><br>
                            Bairro: <input class='bairro form-control' type="text" name="bairro" value = "<?php echo !empty($cliente) ? $cliente['bairro'] : '' ?>"><br>
                            Cidade: <input class='cidade form-control' type="text" name="cidade" value = "<?php echo !empty($cliente) ? $cliente['cidade'] : '' ?>"><br>
                            UF: <input id='uf' class='uf form-control' type="text" name="uf" value = "<?php echo !empty($cliente) ? $cliente['uf'] : '' ?>"><br>
                            Cpf: <input id='cpf' class='cpf form-control' type="text" name="cpf" required value = "<?php echo !empty($cliente) ? $cliente['cpf'] : '' ?>"><br>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>

            </main>


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

    <script>
        $(".cep").change(function () {
            cep = $(".cep").val();
            $.get("https://viacep.com.br/ws/" + cep + "/json/", function (data) {

                $(".endereco").val(data['logradouro']);
                $(".bairro").val(data['bairro']);
                $(".uf").val(data['uf']);
                $(".cidade").val(data['localidade']);

                if (data['erro']) {
                    alert('cep nao encontrado');
                };



            });

        });



        $(".cpf").mask('999.999.999-99');
        $(".cep").mask('99999-999');
    </script>
</body>

</html>