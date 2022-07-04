<?php
require_once("conexaoBanco.php");

$data = $_POST['data'];
$formaPagamento = $_POST['formapag'];

$produtos = array();
$produtos = $_POST['produtos'];

$quantidade = array();
$quantidade = $_POST['quantidades'];

echo $data."<br>";
echo $formaPagamento."<br>";
for($i=0;$i<sizeof($produtos);$i++){
    echo $produtos[$i]."<br>";
}
for($i=0;$i<sizeof($quantidade);$i++){
    echo $quantidade[$i]."<br>";
}




?>