<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de compromissos - Secretária</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formularios.css">	
    <link rel="stylesheet" href="../css/alertas.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script src="../js/agendarCompromisso.js"> </script>
</head>
<body>    

    <h3 class="titulos">Editar Compra de cliente</h3>  


    <table class="table">
		<tr>
			<th>Nome categoria</th>			
		</tr>		
				<tr>

	<?php

	require_once("conexaoBanco.php");
	$comando="SELECT * FROM compras";
	
	if(isset($_GET['pesquisa']) && $_GET['pesquisa']!=""){
		$pesquisa=$_GET['pesquisa'];
		$comando= $comando . " WHERE nome LIKE '".$pesquisa."%'";
		//$comando.= " WHERE nome LIKE '".$pesquisa."%'";
	}
	//echo comando
		$resultado=mysqli_query($conexao,$comando);
		$linhas=mysqli_num_rows($resultado);
	
		if($linhas==0){
			echo "<tr><tb colspan='2'>Nenhuma categoria foi encontrada! </tb></tr>";
		}else{
			$categoriasRetornadas=array();

			while($r = mysqli_fetch_assoc($resultado)){
				array_push($categoriasRetornadas, $r);
			}//fechamento do while
			foreach($categoriasRetornadas as $r){
				echo "<td> ".$r['nome']." </td>";

	?>	
				
				<td>
				<form action="editarCategoriaForm.php" method="POST"  class="formAcao">
					<input type="hidden" name="idCategoria" value="<?=$r['idCategoria']?>">
					<button type="submit" class="botaoAcao">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
						  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
						</svg>
					</button>				
				</form>
				<form action="excluirCategoria.php" method="POST" class="formAcao">
					<input type="hidden" name="idCategoria" value="<?=$r['idCategoria']?>">
					<button type="submit" class="botaoAcao">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
						<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
					</button>				
				</form>
				</td>
			</tr>
			<?php
			}//fechamneto foreach
		}//fechamento else
			?>
	</table>




























	<form action="editarCompraCliente.php" method="POST">

    <?php
        require_once("conexaoBanco.php");
        $idCompra=$_POST['idCompra'];
        $comando="SELECT * FROM compras WHERE idCompra=".$idCompra;
        $resultado=mysqli_query($conexao, $comando);
        $comp=mysqli_fetch_assoc($resultado);    
        ?>

    <input type="hidden" value="<?=$_POST['idCompra']?>" name="idCompra">

    <div class="form-group row">
            <div class="col-md-8">
            <label class="control-label">Tipo </label>
            <select name="idTipo" class="form-control">
            <?php
                require_once("conexaoBanco.php");
                $comando="SELECT * FROM produtos_has_compras";
                $resultado=mysqli_query($conexao,$comando);
                $tipos=array();
                while($tp = mysqli_fetch_assoc($resultado)){
                     array_push($tipos, $tp);
                 }

                foreach($tipos as $tp){
                    if($comp['compras_idCompra'] == $tc['idCompra']){
                    echo "<option selected value='".$tc['idCompra']."'>".$tc['descricao']."</option>";
                    }else{
                    echo "<option value='".$tc['idTipo']."'>".$tc['descricao']."</option>";
                    }
                }
            ?>
            </select>
            </div>
		</div>
		
		<div class="form-group row">           
            <div class="col-md-8">
            <label class="control-label">Descrição do compra *</label>
            <input type="text" name="nome" class="form-control" value="<?=$comp['']?>">
            </div>
		</div>
		
		<div class="form-group row">
		   
            <div class="col-md-3">
                <label class="control-label">Data da compra *</label> 
                <input type="date" name="dataCompra" class="form-control" value="<?=$comp['data']?>">
            </div>
		</div>
		
		<div class="form-group row">		    
		<div class="col-md-4">
            <label class="control-label">produtdo *</label>
            <input type="text" name="produto" class="form-control" value="<?=$comp['produto']?>">
		</div>
        <div class="col-md-3">
            <label class="control-label">quanidade</label> 
            <input type="text" name="quantidade" class="form-control" value="<?=$comp['quantidade']?>"> 
        </div>
        <div class="col-md-1">
            <label class="control-label">status</label> 
            <input type="text" name="status" class="form-control" value="<?=$comp['status']?>">
        </div>
		</div>      
      
        <h6>Pessoas que já estão nesse compromisso </h6>   
        <div class="form-group row" id="pessoasJaEstaoCompromisso">
        <?php
            $comando="SELECT p.idPessoa, p.nome, p.sobrenome FROM pessoas p INNER JOIN compromissos_pessoas cp ON 
            p.idPessoa=cp.pessoas_idPessoa WHERE cp.compromissos_idCompromisso=".$_POST['idComp'];

            $resultado=mysqli_query($conexao, $comando);
            $pessoasDoCompromisso=array();
            
            while($p = mysqli_fetch_assoc($resultado)){
                array_push($pessoasDoCompromisso, $p);
            }

            foreach($pessoasDoCompromisso as $p){
                echo 
                "<div>
                
                <input type='hidden' name='idPessoa[]' value='".$p['idPessoa']."'>".$p['nome']." ".$p['sobrenome']. 
                "<button type='button' class='botaoAcao' onclick='removerPessoaJaEstaNoCompromisso(this)'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-dash-square-dotted' viewBox='0 0 16 16'>
                <path d='M2.5 0c-.166 0-.33.016-.487.048l.194.98A1.51 1.51 0 0 1 2.5 1h.458V0H2.5zm2.292 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zm1.833 0h-.916v1h.916V0zm1.834 0h-.917v1h.917V0zm1.833 0h-.917v1h.917V0zM13.5 0h-.458v1h.458c.1 0 .199.01.293.029l.194-.981A2.51 2.51 0 0 0 13.5 0zm2.079 1.11a2.511 2.511 0 0 0-.69-.689l-.556.831c.164.11.305.251.415.415l.83-.556zM1.11.421a2.511 2.511 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415L1.11.422zM16 2.5c0-.166-.016-.33-.048-.487l-.98.194c.018.094.028.192.028.293v.458h1V2.5zM.048 2.013A2.51 2.51 0 0 0 0 2.5v.458h1V2.5c0-.1.01-.199.029-.293l-.981-.194zM0 3.875v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 5.708v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zM0 7.542v.916h1v-.916H0zm15 .916h1v-.916h-1v.916zM0 9.375v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .916v.917h1v-.917H0zm16 .917v-.917h-1v.917h1zm-16 .917v.458c0 .166.016.33.048.487l.98-.194A1.51 1.51 0 0 1 1 13.5v-.458H0zm16 .458v-.458h-1v.458c0 .1-.01.199-.029.293l.981.194c.032-.158.048-.32.048-.487zM.421 14.89c.183.272.417.506.69.689l.556-.831a1.51 1.51 0 0 1-.415-.415l-.83.556zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373c.158.032.32.048.487.048h.458v-1H2.5c-.1 0-.199-.01-.293-.029l-.194.981zM13.5 16c.166 0 .33-.016.487-.048l-.194-.98A1.51 1.51 0 0 1 13.5 15h-.458v1h.458zm-9.625 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zm1.834 0h.916v-1h-.916v1zm1.833 0h.917v-1h-.917v1zm1.833 0h.917v-1h-.917v1zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z'/>
                </svg>
                </button>
                
                </div>";
            }



        ?>
            
        </div>

		
        <h5 class="col-md-8">Selecione as nova(s) pessoas que farão parte* 
        <button type="button"  onclick="adicionarPessoa()" class="btn btn-secondary">Adicionar pessoa</button></h5>
		
        <div id="pessoasDoCompromisso">  <!--Div que irá conter as pessoas do compromisso-->           
            <div class="form-group row" class="pessoas"> <!--Exemplo de nova pessoa, essa é a div que será clonada -->   	

                    <select name="idPessoa[]" class="col-md-6" onchange="verificarPessoaRepetida(this.value)">
                        <option value='0'>Selecione...</option>
                       <?php
                            require_once("conexaoBanco.php");
                            $comando="SELECT * FROM pessoas";
                            $resultado=mysqli_query($conexao,$comando);
                            $pessoas=array();
                            while($p = mysqli_fetch_assoc($resultado)){
                                array_push($pessoas, $p);
                            }

                            foreach($pessoas as $p){
                                echo "<option value='".$p['idPessoa']."'>".$p['nome']." ".$p['sobrenome']."</option>";
                            }

                        ?>

                    </select>                        
                    <div class="col-md-2">			
                        <button type="button" class="botaoAcao" onclick="removerPessoasEdicao(this)">
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
				<button  class="btn btn-danger" type="reset">voltar</button>
				<button  class="btn btn-success" type="submit">Cancelar Compra</button>			
			</div>
		</div>

	</form> <!-- Fechamento do formulário agendar compromisso -->

</body>
</html>