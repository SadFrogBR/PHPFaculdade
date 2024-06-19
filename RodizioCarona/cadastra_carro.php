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
    <div class="container mt-5">
        <h2>Rodizio de Carona</h2>
        <form method="post" action="cadastra_carro_back.php">
            <div class="form-group">
                <label for="marca">Marca</label>
                <input name="marca" type="text" class="form-control" id="marca" placeholder="Marca">
            </div>
            <div class="form-group">
                <label for="model">Modelo</label>
                <input name="modelo" type="text" class="form-control" id="modelo" placeholder="Modelo">
            </div>
            <div class="form-group">
                <label for="ano">Ano</label>
                <input name="ano" type="number" class="form-control" id="ano" placeholder="Ano">
            </div>
            <div class="form-group">
                <label for="cor">Cor</label>
                <input name="cor" type="text" class="form-control" id="cor" placeholder="Cor">
            </div>
            <div class="form-group">
                <label for="qtd_lugares">Quantidade de lugares</label>
                <select name="qtd_lugares" class="form-control" id="qtd_lugares">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="consumo_combustivel">Consumo de combustivel por km</label>
                <input name="consumo_combustivel" type="number" class="form-control" id="consumo_combustivel" placeholder="consumo combustivel">
            </div>
            
            <div class="row mt-5">
                <div class="col-6">
                    <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
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
