<?php 

    session_start();

    //usuarios do sitema
    
    $usuario_autenticado = false;
    $usario_id = null;
    $usuario_perfil_id = null;

    $perfis = [1 => 'Administrativo', 2 => 'Usuario'];

    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '123', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '123', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '123', 'perfil_id' => 2)
    );

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    foreach($usuarios_app as $user){
        if($email == $user['email'] && $senha == $user['senha']){
            $usuario_autenticado = true;
            $usario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if($usuario_autenticado){
        echo 'Usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
    }


?>