<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar a submissão do formulário
    $usuarioId = $_POST['usuarioId'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $turno = $_POST['turno'];
    $temCarro = $_POST['temCarro'];
    $descricao = $_POST['descricao'];

    $arquivo = fopen('arquivo.hd', 'r');
    $linhas = [];

    while (!feof($arquivo)) {
        $linha = fgets($arquivo);
        if (trim(substr($linha, 0, strpos($linha, '#'))) == $usuarioId) {
            $linha = $usuarioId . '#' . $nome . '#' . $idade . '#' . $cpf . '#' . $turno . '#' . $temCarro . '#' . $descricao . PHP_EOL;
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
} else {
    // Mostrar o formulário de edição
    if (isset($_GET['carroExcluido'])) {
        $usuarioId = $_GET['carroExcluido'];

        $arquivo = fopen('arquivo.hd', 'r');
        $usuarioEncontrado = false;

        while (!feof($arquivo)) {
            $linha = fgets($arquivo);
            if (trim(substr($linha, 0, strpos($linha, '#'))) == $usuarioId) {
                $dadosUsuario = explode('#', $linha);
                $usuarioEncontrado = true;
                break;
            }
        }

        fclose($arquivo);

        if (!$usuarioEncontrado) {
            echo "Usuário não encontrado.";
            exit;
        }
    } else {
        echo "ID do usuário não fornecido.";
        exit;
    }
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                Editar Usuário
            </div>
            <div class="card-body">
                <form method="post" action="editar.php">
                    <input type="hidden" name="usuarioId" value="<?= $usuarioId; ?>">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?= $dadosUsuario[1]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Idade</label>
                        <input type="number" class="form-control" name="idade" value="<?= $dadosUsuario[2]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" class="form-control" name="cpf" value="<?= $dadosUsuario[3]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Turno que estuda</label>
                        <select name="turno" class="form-control" required>
                            <option value="Matutino" <?= ($dadosUsuario[4] == 'Matutino') ? 'selected' : ''; ?>>Matutino</option>
                            <option value="Vespertino" <?= ($dadosUsuario[4] == 'Vespertino') ? 'selected' : ''; ?>>Vespertino</option>
                            <option value="Noturno" <?= ($dadosUsuario[4] == 'Noturno') ? 'selected' : ''; ?>>Noturno</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tem Carro?</label>
                        <select name="temCarro" class="form-control" required>
                            <option value="Sim" <?= ($dadosUsuario[5] == 'Sim') ? 'selected' : ''; ?>>Sim</option>
                            <option value="Nao" <?= ($dadosUsuario[5] == 'Nao') ? 'selected' : ''; ?>>Não</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3" required><?= $dadosUsuario[6]; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
