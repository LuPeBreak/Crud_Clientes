<?php 
  session_start();
  if(!$_SESSION['nome']){
    header("location:Login.php");  
    exit();
  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <?php require __DIR__."/component/adminlte_head.php"; ?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
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
<div class="wrapper">

  
  <?php require __DIR__."/component/adminlte_navbar.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require __DIR__."/component/adminlte_sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper col-sm-12">
    
    
                <?php 
                    require __DIR__."/App/GetClient.php";
                ?>
                <div class='col-sm-10'>
                <h2><?php echo !empty($cliente)? "Atualizar cliente" :"Cadastro de clientes" ;?></h2>
                    <form action=<?php echo !empty($cliente)? "app/UpdateClient.php" :"App/InsertClient.php" ;?> method="POST" onSubmit='return validate()'>
                        
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
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>     
                </div>
    
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php require __DIR__."/component/adminlte_js.php"; ?>

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