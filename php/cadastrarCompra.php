<?php
require_once("conexaoBanco.php");

$produtos = array();
$produtos = $_POST['produtos'];


$quantidade = array();
$quantidade = $_POST['quantidades'];


$formapag = $_POST['forma'];

$data = $_POST['data'];
session_start();
$comando = "INSERT INTO compras (data, formaPagamento, usuarios_idUsuario, status)
VALUES
('".$data."', '".$formapag."', ". $_SESSION['idUsuario'].", 1)";
$resultado = mysqli_query($conexao, $comando);

$ultimaCompra = "SELECT MAX(idCompra) as idCompra FROM compras";
$resultadoIdComp = mysqli_query($conexao, $ultimaCompra);
$idCompra = mysqli_fetch_assoc($resultadoIdComp);

for($i=0; $i < sizeof($produtos); $i++){
    $comando = "INSERT INTO produtos_has_compras (produtos_idProduto, compras_idCompra, quantidade)
    VALUES 
    (".$produtos[$i]." , ".$idCompra['idCompra'].", ".$quantidade[$i].")";
 
    //echo $comando."<br>";
 
    $resultado = mysqli_query($conexao, $comando);
 }

 if($resultado==true){
    header("Location: cadastrarForm.php?retorno=1");
}else{
    header("Location: cadastrarCategoriaForm.php?retorno=0");
}


?> 