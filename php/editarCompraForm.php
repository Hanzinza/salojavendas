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

<?php
	
    require_once("conexaoBanco.php");
    $idCompra=$_POST['idCompra'];
    $comando="SELECT * FROM compras WHERE idCompra=".$idCompra;
    $resultado=mysqli_query($conexao,$comando);
    $r=mysqli_fetch_assoc($resultado);

?>

<h3 class="titulos">Alterar Status</h3>  

<form action="editarCompra.php" method="POST">
    <input type="hidden" name="idCompra" value="<?=$r['idCompra']?>">

    <div class="form-group">
      <label class="control-label">Status Atual </label>  
    <div class="col-md-4">
     
    </div>
    </div>
    
    <div class="form-group">
    <label class="control-label"></label>
    <div class="col-md-8">
    <a href="relacaoForm.php"><button  class="btn btn-warning" type="button">Finalizar</button></a>
        <button  class="btn btn-danger" type="submit">Cancelar</button>			
    </div>
    </div>		
</form>
</body>
</html>