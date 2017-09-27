<?php
require 'init.php';
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, color, price, startdate, quantity FROM produtos WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$produtos = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($produtos)) {
    echo "Nenhum produto encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Usuário</title>
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/estilo2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <h2>Edição de Usuário</h2>
        <form action="edit.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $produtos['name'] ?>">
            <br><br>
            <label for="color">Cor: </label>
            <br>
            <input type="text" name="color" id="color" value="<?php echo $produtos['color'] ?>">
            <br><br>
            <label for="price">Preço: </label>
            <br>
            <input type="text" name="price" id="price" value="<?php echo $produtos['price'] ?>">
            <br><br>
            <label for="startdate">Data da venda: </label>
            <br>
            <input type="date" name="startdate" id="startdate" placeholder="dd/mm/YYYY" 
                   value="<?php echo dateConvert($produtos['startdate']) ?>">
            <br><br>            
            <label for="quantity">Quantidade: </label>
            <br>
            <input type="text" name="quantity" id="quantity" value="<?php echo $produtos['quantity'] ?>">
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Alterar">
        </form>
    </body>
</html>

