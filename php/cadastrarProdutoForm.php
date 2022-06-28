<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/formularios.css">	
   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
    <script src="../js/agendarCompromisso.js"> </script>
</head>
<body>
<h3 class="titulos">Cadastrar Produtos</h3>  

<form action="cadastrarProduto.php" method="POST">
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
                    echo "<option value='".$tp['idCategoria']."'>".$tp['nome']."</option>";
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

<h4 class="titulos">Consulta de Produto</h4>

<form action="#" method="GET" class="formAcao">
		<div class="form-group">
		  
          <div class="col-md-6"> 	
          <label class="control-label" for="textoPesquisa">Descrição </label>		
			 <input class="form-control" id="textoPesquisa" type="text" name="pesquisa">
			 <button type="submit" class="botaoAcao">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
				<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
				</svg>
			 </button>	
            </div>		 
		</div>
	</form>
    <div class="row">
    <div class="col-md-8">
    <table class="table">
		<tr>
			<th>Descrição</th>
			<th>Preço</th>
			<th>Categoria</th>
			<th>Ações</th>
		</tr>
        <tr>
            <?php
            $comando = "SELECT p.nome, p.preco, c.nome as nomeCategoria FROM produtos p
            INNER JOIN categorias c
            ON p.categorias_idCategoria = c.idCategoria";

            if(isset($_GET['pesquisa']) && $_GET['pesquisa']!=""){
                $pesquisa = $_GET['pesquisa'];
                $comando = $comando." WHERE p.nome LIKE '".$pesquisa."%'";
            }

             //echo $comando;

             $resultado = mysqli_query($conexao, $comando);
             $produtosRetornadas = array();
             $linhas = mysqli_num_rows($resultado);

             if($linhas==0){
                 echo "<tr><td colspan = '4'> Nenhum produto encontrado!</td></tr>";
             }else{
                 while($p = mysqli_fetch_assoc($resultado)){
                     array_push($produtosRetornadas, $p);
                 } // fechamento do while
                 foreach($produtosRetornadas as $p)
                 echo "<tr>";
                 echo "<td>".$p['nome']."</td>";
                 echo "<td>".$p['preco']."</td>";
                 echo "<td>".$p['nomeCategoria']."</td>";
                 echo "<td>".$p['nome']."</td>";
             }

            ?>


           
        </tr>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>