<?php
require_once("conexaoBanco.php");

$idProduto = $_POST['idProduto'];

$verProduto = "SELECT * FROM produtos_has_compras WHERE produtos_idProduto=".$idProduto;


$resultadoComp = mysqli_query($conexao, $verProduto);
$linhas = mysqli_num_rows($resultadoComp);

if($linhas == 0){
    $comandoExclusao="DELETE FROM produtos WHERE idProduto=".$idProduto;
    $resultadoVerificar=mysqli_query($conexao, $comandoExclusao);
    echo "deu certo";
}else{
    echo "nao deu certo";
}



?>