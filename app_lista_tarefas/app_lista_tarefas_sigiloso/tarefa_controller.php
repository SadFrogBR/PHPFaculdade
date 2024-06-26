<?php 

    require "../app_lista_tarefas_sigiloso/tarefa.model.php";
    require "../app_lista_tarefas_sigiloso/tarefa.service.php";
    require "../app_lista_tarefas_sigiloso/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    if($acao == 'inserir'){
        if($_POST['tarefa']){


            $tarefa = new Tarefa();

            $tarefa->__set('tarefa', $_POST['tarefa']);

            $conexao = new Conexao();

            $tarefaService = new TarefaService($conexao, $tarefa);
            $tarefaService->inserir();

            header('Location: nova_tarefa.php?inclusao=1');
        }else{
            header('Location: nova_tarefa.php?inclusao=2');
        }
    }else if($acao == 'recuperar'){
        
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();

    }else if($acao == 'atualizar'){
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['tarefa']);
        $tarefa->__set('id', $_POST['id']);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->atualizar();
        if($_GET['pagina'] == 1){
            header('Location: index.php');
        }else{
            header('Location: todas_tarefas.php');
        }
        

    }else if($acao == 'remover'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        if($_GET['pagina'] == 1){
            header('Location: index.php');
        }else{
            header('Location: todas_tarefas.php');
        }
        

    }else if($acao == 'marcarRealizada'){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarRealizada();
        if($_GET['pagina'] == 1){
            header('Location: index.php');
        }else{
            header('Location: todas_tarefas.php');
        }

    }else if($acao == 'pendentes'){
        
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->pendentes();

    }

?>
