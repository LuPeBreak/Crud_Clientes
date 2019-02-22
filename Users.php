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

      </main>

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>


</body>

</html>
