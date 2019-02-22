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
  
</head>

<body>
<?php require __DIR__."/component/navbar.php"; ?>

  <div class="container-fluid">
    <div class="row">
    <?php require __DIR__."/component/sidebar.php"; ?> 

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

         <h4>
         Quantidade de usuarios:<?php require __DIR__."/App/CountUsers.php"; echo $users ?>
         </h4>
          

      </main>


    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

  
</body>

</html>