<?php
	
		require_once("conexaoBanco.php");
		$idCompra=$_POST['idCompra'];
        $status=$_POST['status'];


    $comando="UPDATE compras SET status='".$status."' WHERE idCompra=".$idCompra;

    //echo $comando;

    $resultado=mysqli_query($conexao, $comando);

    if($resultado==true){
        header("Location: consultarCompraForm.php?retorno=1");
    }else{
      header("Location: consultarCompraForm.php?retorno=0");
    }
?>