<?php

require_once("conexaoBanco.php");
$nomeCompleto = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$nrcasa = $_POST['nrcasa'];
$senha = $_POST['senha'];
$nivel=2;

$senhaMD5=md5($senha);

$comando = "INSERT INTO usuarios (nomeCompleto, email, cpf, telefone, senha, cep, numero, nivel)
VALUES
('".$nomeCompleto."', '".$email."', ".$cpf.", '".$telefone."', '".$senhaMD5."', ".$cep.", '".$nrcasa."', '".$nivel."')";

$resultado = mysqli_query($conexao, $comando);

// echo $comando;

if($resultado==true){
    header("Location: ../login.php");
}else{
    header("Location: ../cadastro.php?retorno=0");
}

?>