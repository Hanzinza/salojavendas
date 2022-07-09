<?php
    include_once("menuCliente.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formularios.css">	
    <link rel="stylesheet" href="../css/alertas.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script src="../js/agendarCompromisso.js"> </script>
</head>
<body>
    <h3 class="titulos">Produtos da Compra</h3>
<table class="table">
    <tr><td>Nome do produtos</td><td>Quantidade</td></tr>
    <?php
    
    require_once("conexaoBanco.php");
    $idComp=$_POST['idComp'];
    $comando="SELECT produtos.nome,produtos_has_compras.quantidade FROM compras INNER JOIN produtos_has_compras ON compras.idCompra=produtos_has_compras.compras_idCompra INNER JOIN produtos ON produtos.idProduto=produtos_has_compras.produtos_idProduto WHERE compras.idCompra=".$idComp;
    $resultado=mysqli_query($conexao,$comando);
    $produtos=array();
    while($p = mysqli_fetch_assoc($resultado)){
        array_push($produtos, $p);
    }
    foreach($produtos as $p){
        echo "<tr>
        <td>".$p['nome']."</td>
        <td>".$p['quantidade']."</td>
        </tr>";
    }
    ?>
</table>
</body>
</html>