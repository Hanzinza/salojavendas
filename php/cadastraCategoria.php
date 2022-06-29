<?php
require_once("conexaoBanco.php");
$nomeCategoria=$_POST['nome'];

$comando="INSERT INTO categorias (nome) VALUES ('".$nomeCategoria."')";

//echo $comando;

$resultado=mysqli_query($conexao, $comando);
if($resultado==true){
    header("Location: cadastrarCategoriaForm.php?retorno=1");
}else{
    header("Location: cadastrarCategoriaForm.php?retorno=0");
}
?>