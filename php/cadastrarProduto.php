<?php
require_once("conexaoBanco.php");

$descricao = $_POST['descricao'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$tipoCategoria = $_POST['idTipo'];


$comando = "INSERT INTO produtos (nome, descricao, preco, categorias_idCategoria)
VALUES
('".$nome."', '".$descricao."', ".$preco.", ".$tipoCategoria.")";

//echo $comando;

$resultado = mysqli_query($conexao, $comando);

if($resultado == true){
    header("Location: cadastrarProdutoForm.php?retorno=1");
}else{
    header("Location: cadastrarProdutoForm.php?retorno=0");
}

?>