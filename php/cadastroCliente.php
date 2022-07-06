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
('".$nomeCompleto."', '".$email."', '".$cpf."', '".$telefone."', '".$senhaMD5."', '".$cep."', '".$nrcasa."', '".$nivel."')";

$resultado = mysqli_query($conexao, $comando);

// echo $comando;
if($linhas==0){
    header("Location: ../index.php?retorno=2");
}else{
    $usuario=mysqli_fetch_assoc($resultado);
    session_start();
    $_SESSION['nivel']=$usuario['nivel'];
    $_SESSION['idUsuario']=$usuario['idUsuario'];
    if($usuario['nivel']=='1'){
        header("Location: principalGerente.php");
    }else{
        header("Location: principalCliente.php");
    }
}


?>