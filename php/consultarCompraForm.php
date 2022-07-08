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

    <h3 class="titulos">Consulta de Compras </h3>  
	
	<form action="#" method="GET" class="formAcao">
		<div class="form-group">

		<label>Data da compra </label>	 
        <input class="form-control" id="textoPesquisa" type="date" name="pesquisaData">

        <label>Nome do cliente </label>	 
             <select name="pesquisaCliente">
             <?php
			require_once("conexaoBanco.php");
			$comando="SELECT * FROM usuarios where nivel=2";
			$resultado=mysqli_query($conexao,$comando);
			$clientesRetornados=array();
			while($c = mysqli_fetch_assoc($resultado)){
				array_push($clientesRetornados, $c);
			}
			foreach($clientesRetornados as $c){
				echo "<option value='".$c['idUsuario']."'> ".$c['nomeCompleto']."</option>";
			}
			?>
            </select> 
			 <button type="submit" class="botaoAcao">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg>
			 </button>			 
		</div>
	</form>
	
	<div class="col-md-8">
	<table class="table">
		<tr>
			<th>Data</th>	
            <th>Ver Produtos</th>	
            <th>Status</th>	
            <th>Cancelar Compra</th>	     
		</tr>
        
        <?php
        $comando="SELECT * FROM compras"; 
        
        //Ajustar o comando fazendo o inner join com o cliente    
        if((isset($_GET['pesquisaData']) && $_GET['pesquisaData']!="") || 
        (isset($_GET['pesquisaCliente']) && $_GET['pesquisaCliente']!="")){
            $pesquisaData = $_GET['pesquisaData'];
            $pesquisaCliente = $_GET['pesquisaCliente'];
            $comando = $comando . " WHERE usuarios_idUsuario =".$pesquisaCliente. " or data='".$pesquisaData."'";
        }
        //echo $comando;
        $resultado=mysqli_query($conexao, $comando);
        $clientesRetornados= array();
        $linhas=mysqli_num_rows($resultado);

        if($linhas==0){
            echo "<tr><td colspan='6'>Nenhuma compra foi encontrada!</td></tr>";
        }else{
            while($c = mysqli_fetch_assoc($resultado)){
                array_push($clientesRetornados, $c);
            }
            foreach($clientesRetornados as $c){
                echo "<tr>";
                echo "<td>".date('d/m/Y',strtotime($c['data']))."</td>";
                echo "<td>";                
                ?>

                <form action="visualizarMais.php" method="POST" class="formAcao">
				<input type="hidden" name="idComp" value="<?=$c['idCompra']?>">
				<button type="submit" class="botaoAcao">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
				</button>				
			</form>	
                
                
                <?php 
                  echo "</td>";
                  echo "<td>";
            
        
                //se o status for 1...
                //echo  "<td>" jkahdahdkahd "</td>";
                //else if status for 2...
                //echo  "<td>" ahdkhaad "</td>";
                //else
                // echo "<td>".$c['status']."</td>";
                if($c['status']=="1"){
                    echo "Andamento";
                }else if($c['status']=="2"){
                        echo "Finalizado";
                
                }else if($c['status']=="3"){
                        echo "Cancelado"; 
                } 
                

                echo "</td>"; 
                echo "<td>"; 
                 ?>
                <form action="editarCompraForm.php" method="POST" class="formAcao">
					<input type="hidden" name="idCompra" value="<?=$c['idCompra']?>">
					<button type="submit" class="botaoAcao">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
						<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
					</button>				
				</form>
                <?php  
                echo "</td> </tr>";
                }//fecha foreach
            }//fecha else
                
                 ?>
            </table>

</body>
</html>