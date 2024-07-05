<?php 

    $id = $_POST['idDeleta'];
    $com=mysqli_connect("localhost","root","","pessoa");//conecta ao banco de dados 
	$sql="DELETE from pessoas where id=$id";
	$dados=mysqli_query($com,$sql);//executa a query
    echo $dados;
?>