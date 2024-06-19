<?php
$carroExcluido = $_GET['carroExcluido']; // Obtém o parâmetro da URL


ExcluiCarro($carroExcluido);


$arquivo = fopen('arquivo.hd', 'r'); 

$linhas = [];
while (!feof($arquivo)) {
    $linha = fgets($arquivo); 

    
    if (trim(substr($linha, 0, 1)) == $carroExcluido) {
        continue; 
    }

    $linhas[] = $linha; 
}

fclose($arquivo); 

$arquivo = fopen('arquivo.hd', 'w'); 

foreach ($linhas as $linha) {
    fwrite($arquivo, $linha); 
}

fclose($arquivo);

header('Location: listar.php');

function ExcluiCarro($carroExcluido){

  $arquivo = fopen('arquivo_carro.hd', 'r'); 
  $carroFoiExcluido = false;
  $linhas = [];
  while (!feof($arquivo)) {
      $linha = fgets($arquivo); 
  
      
      if (trim(substr($linha, 0, 1)) == $carroExcluido) {
        $carroFoiExcluido = true;
          continue; 
      }
  
      $linhas[] = $linha; 
  }
  
  fclose($arquivo); 
  
  if($carroFoiExcluido == true){
    $arquivo = fopen('arquivo_carro.hd', 'w'); 
    
    foreach ($linhas as $linha) {
        fwrite($arquivo, $linha); 
    }

    fclose($arquivo);
  }
  
  }
?>
