<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Produto</title>
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="bootstrap/css/estilo2.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Sistema de Cadastro de Produtos</h1>
        <h2>Cadastro de Produto</h2>
        <form action="add.php" method="post" id="for">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="color">Cor: </label>
            <br>
            <input type="text" name="color" id="color">
            <br><br>
            <label for="price">Preço: </label>
            <br>
            <input type="text" name="price" id="price">
            <br><br>
            <label for="startdate">Data da venda: </label>
            <br>
            <input type="date" name="startdate" id="startdate" placeholder="dd/mm/YYYY">
            <br><br>
            <label for="quantity">Quantidade: </label>
            <br>
            <input type="text" name="quantity" id="quantity">
            <br><br>
            <input id="iput" type="submit" value="Cadastrar" >
        </form>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="bootstrap/js/npm.js" type="text/javascript"></script>
    </body>
</html>

