<?php

require_once("conexaoBanco.php");

$idCategoria=$_POST['idCategoria'];

$verProduto="SELECT idProduto FROM produtos WHERE categorias_idCategoria=".$idCategoria;

//echo $verProduto;

$resultadoCategoria = mysqli_query($conexao, $verProduto);
$linhas=mysqli_num_rows($resultadoCategoria);

if($linhas==0){
    $comando="DELETE FROM categorias WHERE idCategoria=".$idCategoria;
    $resultado=mysqli_query($conexao,$comando);

}else{
    echo "{Não pode excluir}";
}

?>