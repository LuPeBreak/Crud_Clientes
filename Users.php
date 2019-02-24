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
        <div  class="col-md-10">


          <h2>Usuarios</h2>
          <a class="btn btn-primary" href="/Register.php" role="button">Cadastrar</a><br><br>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Login</th>
                  <th>Senha</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
      require __DIR__."/App/ReadUser.php";

      foreach($users as $user){
        echo "<tr>";
        echo "<td>{$user['id']}</td>";
        echo "<td>{$user['nome']}</td>";
        echo "<td>{$user['login']}</td>";
        echo "<td>{$user['senha']}</td>";
        echo "<td><a class='btn btn-danger btn-sm' href='App/DeleteUser.php?id={$user['id']}'>Deletar</a>  <a class='btn btn-light btn-sm' href='/Register.php?id={$user['id']}'>Atualizar</a></td>";
        echo "</tr>";
        }
      ?>
              </tbody>
            </table>
          </div>


        </div>
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