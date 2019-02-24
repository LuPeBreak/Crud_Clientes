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
<div class="wrapper">

  
  <?php require __DIR__."/component/adminlte_navbar.php"; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require __DIR__."/component/adminlte_sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper col-sm-12">
    <section class="section">
      <main role="main" class=" ml-sm-auto col-lg-10 px-4">
      <div class="">
          <h2>Clientes</h2>
          
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Endereço</th>
                  <th>Numero</th>
                  <th>Bairro</th>
                  <th>CEP</th>
                  <th>Cidade</th>
                  <th>UF</th>
                  <th>CPF</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                require __DIR__."/App/ReadClient.php";

                foreach($clientes as $cliente){
                  echo "<tr>";
                  echo "<td>{$cliente['nome']}</td>";
                  echo "<td>{$cliente['email']}</td>";
                  echo "<td>{$cliente['endereco']}</td>";
                  echo "<td>{$cliente['numero']}</td>";
                  echo "<td>{$cliente['bairro']}</td>";
                  echo "<td>{$cliente['cep']}</td>";
                  echo "<td>{$cliente['cidade']}</td>";
                  echo "<td>{$cliente['uf']}</td>";
                  echo "<td>{$cliente['cpf']}</td>";
                  echo "<td><a class='btn btn-danger btn-sm' href='App/DeleteClient.php?id={$cliente['id']}'>Deletar</a>  <a class='btn btn-primary btn-sm' href='ClientRegister.php?id={$cliente['id']}'>Atualizar</a></td>";
                  echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        
        </main>
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php require __DIR__."/component/adminlte_js.php"; ?>


</body>
</html>