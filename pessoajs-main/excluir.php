<?php 

    $id = $_POST['idDeleta'];
    $com=mysqli_connect("localhost","root","","pessoa");//conecta ao banco de dados 
	$sql="DELETE from pessoas where id=$id";
	$dados=mysqli_query($com,$sql);//executa a query
    if($dados){
        $msg='{"texto":"Dados excluidos com sucesso!","color":"red","resposta":"true"}';
    }else{
        $msg='{"texto":"Dados não salvos com sucesso!","color":"#55b555"}';
    }
    echo $msg;
?>