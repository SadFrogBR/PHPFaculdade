<?php
	session_start();
 
    $arquivo = fopen('../app_help_desk/arquivo.hd', 'a');
 
    $texto = [];
    foreach($_POST as $valor){
        array_push($texto, str_replace('#', '-', $valor));
    }
	array_unshift($texto, $_SESSION['id']);
    $texto = implode('#', $texto).PHP_EOL;
 
    fwrite($arquivo, $texto);
 
    fclose($arquivo);

    header('Location: home.php');
 
?>