<?php
require_once("conexaoBanco.php");

$data = $_POST['data'];
$formaPagamento = $_POST['formapag'];

$produtos = array();
$produtos = $_POST['produtos'];

$quantidade = array();
$quantidade = $_POST['quantidades'];

$precos=array();
for($i=0;$i<sizeof($produtos);$i++){
   $comando="SELECT preco FROM produtos WHERE idProduto=".$produtos[$i];
   $resultado=mysqli_query($conexao, $comando);
   $preco=mysqli_fetch_assoc($resultado);
   array_push($precos, $preco['preco']);
}
$total=0;
for($i=0;$i<sizeof($quantidade);$i++){
    $total=(floatval($precos[$i]) * intval($quantidade[$i])) + $total;
}
//echo "Valor total da compra ".floatval($total);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h1> O valor total da compra foi <?=floatval($total)?></h1>
.. mais info da compra

<form action="cadastrarCompra.php" method="post">
    <input type="hidden" value="<?=$data?>" name="data">
    <input type="hidden" value="<?=$formaPagamento?>" name="forma">
    <input type="hidden" value="<?=$produtos?>" name="produtos[]">
    <input type="hidden" value="<?=$quantidade?>" name="quantidades[]">
    <?php  
    echo "a forma de pagamento foi ".$formaPagamento

    ?>
<h3> Você deseja comprar </h3>
<button type="submit"> Confirmar o pedido </button>
</form>

