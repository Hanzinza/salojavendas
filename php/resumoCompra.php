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
<h3> O valor total da compra foi <?=floatval($total)?></h3>

<div class="col-md-3">
<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
       Mais informações da compra
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body"> 
            <h6>Data: <input type="date" class="form-control" value="<?=$data?>" name="data"></h6> 
            <h6>Forma de Pagamento: <input type="text" class="form-control" value="<?=$formaPagamento?>" name="forma"></h6>
            <h6>Produto: <input type="text" class="form-control" value="<?=$produtos?>" name="produtos[]"></h6>
            <h6>Quantidade: <input type="text" class="form-control" value="<?=$quantidade?>" name="quantidades[]"></h6>
</div>
    </div>
  </div>
  </div>

  
</div>
.. mais info da compra
<form action="cadastrarCompra.php" method="post">
<div class="form-group row">           
                    <div class="col-md-8">
                    <label class="control-label">Descrição do compromisso *</label>
                    <input type="text" name="descricao" class="form-control" >
                    </div>
                </div>
                
                <div class="form-group row">
                
                    <div class="col-md-3">
                        <label class="control-label">Data de início *</label> 
                        <input type="date" name="dataInicio" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="control-label">Data de finalização *</label>             
                        <input type="date" name="dataFim" class="form-control" >            
                    </div>
                    <div class="col-md-1">
                        <label class="control-label">Hora *</label>             
                        <input type="time" name="hora" class="form-control" >            
                    </div>
                </div>
                
                <div class="form-group row">		    
                <div class="col-md-4">
                    <label class="control-label">Local *</label>
                    <input type="text" name="local" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="control-label">CEP</label> 
                    <input type="text" onblur="preencherEndereco(this.value)" name="cep" class="form-control"> 
                </div>
                <div class="col-md-1">
                    <label class="control-label">Nº</label> 
                    <input type="text" name="numero" class="form-control"> 
                </div>
                </div>
            
                <div class="form-group row">
                    
                    <div class="col-md-3">
                    <label class="control-label">Rua</label>
                    <input type="text" id="rua" name="rua" class="form-control">
                    </div>

                    <div class="col-md-2">
                    <label class="control-label">Bairro</label>
                    <input type="text" id="bairro" name="bairro" class="form-control">
                    </div>

                    <div class="col-md-3">
                    <label class="control-label">Estado</label>
                    <input type="text"  id="estado" name="estado" class="form-control">
                    </div>



                </div>
            
                <div class="form-group row">		    
                    <div class="col-md-2">
                    <label class="control-label">Cidade</label>
                    <input type="text" name="cidade" class="form-control">
                    
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Observação</label>
                        <input type="text" name="obs" class="form-control" value="">
                    </div>
                </div> 
                
                <div class="form-group">
                    <label class="control-label"></label>
                    
                </div>
                </form>
                <div class="col-md-8">
                        <button  class="btn btn-danger" type="reset">Cancelar</button>
                        <button  class="btn btn-success" type="submit">Confirmar o pedido</button>			
                    </div>
</body>
</html>



<h3> O valor total da compra foi <?=floatval($total)?></h3>
.. mais info da compra

<form action="cadastrarCompra.php" method="post">
    <input type="hidden" value="<?=$data?>" name="data">
    <input type="hidden" value="<?=$formaPagamento?>" name="forma">
    <input type="hidden" value="<?=$produtos?>" name="produtos[]">
    <input type="hidden" value="<?=$quantidade?>" name="quantidades[]">
<h3> Você deseja comprar </h3>
<button type="submit"> Confirmar o pedido </button>
</form>

