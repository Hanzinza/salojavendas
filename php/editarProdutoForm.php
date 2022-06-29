<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>	
   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script src="../js/agendarCompromisso.js"> </script>
</head>
<body>
  

<h3 class="titulos">Cadastrar Produtos</h3>  

<form action="editarProduto.php" method="POST">

<?php
    require_once("conexaoBanco.php");
    $idProduto=$_POST['idProduto'];

    $comando="SELECT * FROM produtos WHERE idProduto=".$idProduto;
     
    $resultado=mysqli_query($conexao,$comando);
    $t=mysqli_fetch_assoc($resultado);
?>
<div class="form-group row">           
            <div class="col-md-8">
            <label class="control-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" >
            </div>
</div>

<div class="form-group row">           
            <div class="col-md-8">
            <label class="control-label">nome</label>
            <input type="text" name="nome" class="form-control" >
            </div>
</div>

<div class="form-group row">
            <div class="col-md-8">
            <label class="control-label">Categoria</label>
            <select name="idTipo" class="form-control">
            <?php
                require_once("conexaoBanco.php");
                $comando="SELECT * FROM categorias";
                $resultado=mysqli_query($conexao,$comando);
                $tipos=array();
                while($tp = mysqli_fetch_assoc($resultado)){
                     array_push($tipos, $tp);
                 }

                foreach($tipos as $tp){
                    if($comp['tiposCategoria_idTipo'] == $tp['idCategoria']){
                        echo "<option selected value='".$tp['idCategoria']."'>".$tp['categoria']."</option>";
                    }else{
                        echo "option value='".$tp['idCategoria']."'>".$tp['categoria']."</option>";
                    }
                }
            ?>
            </select>
</div>

<div class="form-group row">           
            <div class="col-md-8">
            <label class="control-label">preço</label>
            <input type="number" name="preco" class="form-control" >
            </div>
</div>

<div class="form-group">
			<label class="control-label"></label>
			<div class="col-md-8">
				<button  class="btn btn-danger" type="reset">Cancelar</button>
				<button  class="btn btn-success" type="submit">Cadastrar</button>			
			</div>
		</div>
</form>