<?php
session_start();
if(isset($_SESSION['nivel']) && $_SESSION['nivel']=="2"){

?>       
       <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Comprar Produtos - Clientes</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
             <link rel="stylesheet" href="../css/formularios.css">	
            <link rel="stylesheet" href="../css/alertas.css">          
            <script src="../js/agendarCompromisso.js"> </script>
        </head>
        <body>
        <div id="alertas">
    <?php if(isset($_GET['retorno'])==true && $_GET['retorno']==0){ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span>Houve algum problema para cadastrar a compra!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php }else if(isset($_GET['retorno'])==true && $_GET['retorno']==1){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>Compra cadastrada com sucesso!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php }else if(isset($_GET['retorno'])==true && $_GET['retorno']==2){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span>Compra excluída com sucesso!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
	

    <?php } ?>
        
    </div>
            <?php include("menuCliente.php"); ?>   
            
            <h3 class="titulos">Comprar produtos</h3>  
<div class='col-md-2'>
<form action="resumoCompra.php" method="POST">
<label class='control-label'>Data *</label> 
<input type='date' name='data' class='form-control'>
</div>
<div class='col-md-2'>
<label class='control-label'>forma de pagamento</label>

                        
                        <select name="formapag" class='form-control'>
                        
                        <option value="1">Cartão</option>
                        <option value="2">Boleto</option>
                        <option value="3">Vista</option>
                        <option value="4">Dinheiro</option>
                     
                        </select>
</div>


    <div class="form-group row" id="produto0">
    <div class="row">  
    <br>
    <br>
    <h5 class="col-md-8"> 
    
    <button type="button"  onclick="adicionarProdutos()" class="btn btn-secondary">Adicionar produto</button></h5>
    
    <div id="produtos">  <!--Div que irá conter as pessoas do compromisso-->           
        <div class="form-group row" class="produtos"> <!--Exemplo de nova pessoa. Div que será clonada ao clicar em Adicionar Pessoa-->   			
             
                                    
                        <div class='col-md-2'>
                        <label class='control-label'>Produto</label>
                        
                        <select name="produtos[]" class='form-control'>
                        <?php
                            require_once("conexaoBanco.php");
                            $comando="SELECT * FROM produtos";
                            $resultado=mysqli_query($conexao,$comando);
                          
                            $produtos=array();
                            while($p = mysqli_fetch_assoc($resultado)){
                                array_push($produtos, $p);
                            }
                            foreach($produtos as $p){
                                echo "<option value=".$p['idProduto'].">".$p['nome']."</option>";
                            }
                         ?>
                        </select>

                        </div>
    
                       
                        <div class='col-md-2'>
                        <label class='control-label'>Quantidade</label>
                        <input type='text'  id='quantidade' name='quantidades[]' class='form-control' value="">
                        </div>
                        <div class='col-md-4'>
                        </div>
                        <br>
                       
                
      
                             
                <div class="col-md-2">			
                    <button type="button" class="botaoAcao" onclick="removerProduto(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square-dotted" viewBox="0 0 16 16">
                        <path d="M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834 0h.916v-1h-.916v1zm1.833 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                        </svg>
                    </button>
                </div>	
        </div> <!--Fechamento da div de nova pessoa-->   
    </div> <!--Fechamento da div que irá conter as pessoas do compromisso-->

    <div class="form-group">
        <label class="control-label"></label>
        <div class="col-md-8">
            <button  class="btn btn-danger" type="reset">Cancelar</button>
            <button  class="btn btn-success" type="submit">Cadastrar</button>			
        </div>
    </div>

</form> <!-- Fechamento do formulário agendar compromisso -->

 <?php
}else{
    header("Location: alertaEfetuarLogin.html");
}
    
    ?>
            
