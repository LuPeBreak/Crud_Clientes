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
  <div class="content-wrapper">
    <section class="section">
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h3>
          Quantidade de clientes:
          <?php require __DIR__."/App/CountUsers.php"; echo $users ?>
        </h3>
    </section>
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