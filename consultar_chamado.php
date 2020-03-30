<?php require_once 'validador_acesso.php'; ?>

<?php
  //abrir arquivo.hd

  $arquivo = fopen('arquivo.hd', 'r'); //parametro 'r' para leitura

  $chamados = [];

  //enquanto houverem linhas a serem recuperadas
  while(!feof($arquivo)) { //"feof" procura o end of file.
    //percore linha por linha do arquivo, procurando o eof
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }
  //fechamento do arquivo
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php
                foreach($chamados as $chamado){ 
                  $chamado_dados = explode('#', $chamado); //cria um array

                  //
                  if($_SESSION['perfil_id'] == 2) {
                    //so vamos exibir se for criado pelo user
                    if($_SESSION['id'] != $chamado_dados[0]) {
                      continue; // para o foreach seguir para proxima iteração
                      //desconsidera tudo apos o continue
                    }
                  }

                  if(count($chamado_dados) < 3) {
                    continue;
                    }
                ?>

                  <div class="card mb-3 bg-light">
                    <div class="card-body">
                      <h5 class="card-title"><?= $chamado_dados[1]?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2]?></h6>
                      <p class="card-text"><?= $chamado_dados[3]?></p>
                      
                    </div>
                  </div>

                <?php
                  } 
                ?>
                
              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>