<?php
	
		require_once("conexaoBanco.php");
		$idCategoria=$_POST['idCategoria'];
        $nome=$_POST['nome'];

        $comando="UPDATE categorias SET nome='".$nome."' WHERE idCategoria=".$idCategoria;

    //echo $comando;

    $resultado=mysqli_query($conexao, $comando);

    if($resultado==true){
        header("Location: cadastrarCategoriaForm.php?retorno=4");
    }else{
        header("Location: cadastrarCategoriaForm.php?retorno=5");
    }
?>