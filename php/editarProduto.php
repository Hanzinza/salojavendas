<?php
require_once("conexaoBanco.php");

$descricao = $_POST['descricao'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$tipoCategoria = $_POST['idTipo'];

$idCategoria=$_POST['???'];


$comandoEdicaoProduto="UPDATE produtos SET
nome='".$nome."',
descricao='".$descricao."',
preco='".$preco."',
categorias_idCategoria=".$tipoCategoria." WHERE idCategoria=".$idCategoria;

echo $comandoEdicaoProduto;


?>