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
<?php
    include_once("menuCliente.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style=" background-color: rgba(221, 235, 235, 0.644);">
<br>

<h4> O valor total da compra foi R$ <?=floatval($total)?></h4>
<p>Data da compra:<?=$data?> </p>
<p>Forma pagamento:<?=$formaPagamento?></p>


<form action="cadastrarCompra.php" method="post">
    <input type="hidden" value="<?=$data?>" name="data">
    <input type="hidden" value="<?=$formaPagamento?>" name="forma">
    <input type="hidden" value="<?=$produtos?>" name="produtos[]">
    <input type="hidden" value="<?=$quantidade?>" name="quantidades[]">
<h3> Você deseja comprar </h3>
<button type="submit" class="btn btn-success"> Confirmar o pedido </button>
</form>

<a href=""><button type="button" class="btn btn-danger"> Descartar o pedido </button></a>

</body>
</html>

