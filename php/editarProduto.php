<?php
require_once("conexaoBanco.php");

$descricao = $_POST['descricao'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$tipoCategoria = $_POST['idTipo'];

$idProduto=$_POST['idProduto'];


$comandoEdicaoProduto="UPDATE produtos SET
nome='".$nome."',
descricao='".$descricao."',
preco='".$preco."',
categorias_idCategoria=".$tipoCategoria." WHERE idProduto=".$idProduto;

//echo $comandoEdicaoProduto;

$resultado = mysqli_query($conexao, $comandoEdicaoProduto);

if($resultado == true){
    echo "deu certo";
}else{
    echo "não deu certo";
}


?>