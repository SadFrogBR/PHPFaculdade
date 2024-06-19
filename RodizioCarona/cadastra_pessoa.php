<?php

    session_start();
    $id = 0;
    $arquivo = fopen('arquivo.hd', 'r');
    while(!feof($arquivo)){
        $linha = fgets($arquivo);
        if($linha){
            $id = (int)substr($linha, 0, 1);
        }
    }
    
    fclose($arquivo);

    $arquivo = fopen('arquivo.hd', 'a');
 
    $texto = [];
    foreach($_POST as $valor){
        array_push($texto, str_replace('#', '-', $valor));
    }
	array_unshift($texto, $_SESSION['id'] = $id + 1);
    $texto = implode('#', $texto).PHP_EOL;
 
    fwrite($arquivo, $texto);
 
    fclose($arquivo);

    if($_POST['temCarro'] == 'Sim'){
        header('Location: cadastra_carro.php');
    }else{
        header('Location: index.php');
    }
    


?>