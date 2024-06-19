<?php

    session_start();

    $arquivo = fopen('arquivo_carro.hd', 'a');
 
    $texto = [];
    foreach($_POST as $valor){
        array_push($texto, str_replace('#', '-', $valor));
    }
	array_unshift($texto, $_SESSION['id']);
    $texto = implode('#', $texto).PHP_EOL;
 
    fwrite($arquivo, $texto);
 
    fclose($arquivo);

    header('Location: index.php');
    


?>