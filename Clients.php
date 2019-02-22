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
  <meta name="description" content="">
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
<?php require __DIR__."/component/navbar.php"; ?>

  <div class="container-fluid">
    <div class="row">
    <?php require __DIR__."/component/sidebar.php"; ?> 

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <div class="panel panel-default">
          <h2>Clientes</h2>
          <div class="table-responsive">
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
                  echo "<td><a class='btn btn-danger btn-sm' href='App/DeleteClient.php?id={$cliente['id']}'>Deletar</a>  <a class='btn btn-light btn-sm' href='ClientRegister.php?id={$cliente['id']}'>Atualizar</a></td>";
                  echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

      </main>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>


</body>

</html>
