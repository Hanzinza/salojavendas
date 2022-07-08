<?php

require_once("conexaoBanco.php");

$idCompra=$_POST['idCompra'];

$verCompra="SELECT idCompra FROM compras WHERE idCompra=".$idCompra;

//echo $verCompra;

$resultadoCompra = mysqli_query($conexao, $verCompra);
$linhas=mysqli_num_rows($resultadoCompra);

if($linhas==0){
    $comando="DELETE FROM compras WHERE idCompra=".$idCompra;
    $resultado=mysqli_query($conexao,$comando);
}

?>