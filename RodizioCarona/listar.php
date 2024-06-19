<?php
 
  $arquivo = fopen('arquivo.hd', 'r');
  
  $linhas = [];
  
  while(!feof($arquivo)){
    $linha = fgets($arquivo);
    $linhas[] = $linha;
    
  }
 
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

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Rodizio de Carona</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Cadastrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listar.php">Listar Usuários</a>
                </li>
            </ul>
        </div>
    </nav>
 
    <div class="container">    
      <div class="row">
 
        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
 
              <?php foreach($linhas as $linha){ ?>
 
                <?php
                  $chamado_dados = explode('#', $linha);
                  
                  if(count($chamado_dados) < 7){
                    continue;
                  }
                ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= 'Nome: '.$chamado_dados[1]; ?></h5>
                    <p class="card-text"><?= 'Idade: '.$chamado_dados[2]; ?></p>
                    <p class="card-text"><?= 'Cpf: '.$chamado_dados[3]; ?></p>
                    <p class="card-text"><?= 'Turno: '.$chamado_dados[4]; ?></p>
                    <p class="card-text"><?= 'Tem Carro: '.$chamado_dados[5]; ?></p>
                    <p class="card-text"><?= 'Descrição: '.$chamado_dados[6]; ?></p>
                    <?php 
                        $arquivo_carro = fopen('arquivo_carro.hd', 'r');
    
                        $Info_carro;
                        
                        while(!feof($arquivo_carro)){
                            $linha_carro = fgets($arquivo_carro);
                            if($chamado_dados[0] == substr($linha_carro, 0, 1)){
                                $Info_carro = $linha_carro;
                            }
                            
                        }
                        
                        $chamado_dados_carro = [];
                        if(!empty($Info_carro)){
                          if($chamado_dados[0] == substr($Info_carro, 0, 1)){
                            $chamado_dados_carro = explode('#', $Info_carro);
                    ?>

                    <div class="card mb-3 bg-sucess">
                        <div class="card-body">
                            <h5 class="card-title">Carro: </h5>
                            <p class="card-text"><?= 'Marca: '.$chamado_dados_carro[1]; ?></p>
                            <p class="card-text"><?= 'Modelo: '.$chamado_dados_carro[2]; ?></p>
                            <p class="card-text"><?= 'Ano: '.$chamado_dados_carro[3]; ?></p>
                            <p class="card-text"><?= 'Cor: '.$chamado_dados_carro[4]; ?></p>
                            <p class="card-text"><?= 'Quantidade de lugares: '.$chamado_dados_carro[5]; ?></p>
                            <p class="card-text"><?= 'Consumo de combustivel: '.$chamado_dados_carro[6]; ?></p>
                        </div>
                    </div>
                    <?php 
                      }}
                      fclose($arquivo_carro);
                    ?>
                      <a href="editar.php?carroExcluido=<?= $chamado_dados[0]; ?>" class="btn btn-primary">Editar</a>
                      <a href="excluir.php?carroExcluido=<?= $chamado_dados[0]; ?>" class="btn btn-danger">Excluir</a>                 
                  </div>
                </div>
              <?php }?>
 
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="index.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>