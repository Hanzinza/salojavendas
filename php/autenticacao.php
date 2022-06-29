<?php

require_once("conexaoBanco.php");

$email=$_POST['email'];
$senha=$_POST['senha'];

$senhaMD5=md5($senha);

$comando = "SELECT * FROM  usuarios WHERE email='".$email."' AND  senha='".$senhaMD5."'";

$resultado=mysqli_query($conexao,$comando);

$linhas=mysqli_num_rows($resultado);

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