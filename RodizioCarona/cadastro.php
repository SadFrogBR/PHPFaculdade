<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rodizio de Carona</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <h2>Rodizio de Carona</h2>
        <form method="post" action="cadastra_pessoa.php">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input name="idade" type="number" class="form-control" id="idade" placeholder="Idade">
            </div>
            <div class="form-group">
                <label for="cpf">Cpf</label>
                <input name="cpf" type="text" class="form-control" id="cpf" placeholder="CPF">
            </div>
            <div class="form-group">
                <label for="turno">Turno que estuda</label>
                <select name="turno" class="form-control" id="turno">
                    <option>Matutino</option>
                    <option>Vespertino</option>
                    <option>Noturno</option>
                </select>
            </div>
            <div class="form-group">
                <label for="temCarro">Tem Carro?</label>
                <select name="temCarro" class="form-control" id="temCarro">
                    <option>Sim</option>
                    <option>Nao</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control" id="descricao" rows="3" placeholder="Descreva va onde vc mora e o caminho que faz ate em casa..."></textarea>
            </div>
            <div class="row mt-5">
                <div class="col-6">
                    <a class="btn btn-lg btn-warning btn-block" href="index.php">Voltar</a>
                </div>
                <div class="col-6">
                    <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
