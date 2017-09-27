<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM produtos ORDER BY name ASC";
// SQL para selecionar os registros
$sql = "SELECT id, name, color, price, startdate, quantity "
        . "FROM produtos ORDER BY name ASC";
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cadastro</title>
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1 class="jumbotron text-center">Sistema de Cadastro</h1>
        <p><a href="form-add.php">Adicionar Produto</a></p>
        <h2 class="text-center" >Lista de Produtos</h2>
        <p>Total de Produtos: <?php echo $total ?></p>
        <?php if ($total > 0): ?>
        <table class="table table-bordered" width="50%">
                        <thead class="thead-inverse">
                    <tr>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Preço</th>
                        <th>Data de inicio de venda</th>
                        <th>quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($produtos = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $produtos['name'] ?></td>
                            <td><?php echo $produtos['color'] ?></td>
                            <td><?php echo $produtos['price'] ?></td>
                            <td><?php echo dateConvert($produtos['startdate']) ?></td>
                            <td><?php echo $produtos['quantity'] ?></td>
                            <td>
                                <a href="form-edit.php?id=<?php echo $produtos['id'] ?>">Editar</a>
                                <a href="delete.php?id=<?php echo $produtos['id'] ?>" 
                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto registrado</p>
        <?php endif; ?>
            <footer class="mas py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Feito por: Jonathan micael e bruno gabriel</p>
            </div>
        </footer>
            <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="bootstrap/js/npm.js" type="text/javascript"></script>
    </body>
</html>