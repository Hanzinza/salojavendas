<?php

function listarCategoria(){
    require_once("conexaoBanco.php");
    $comando = "SELECT * FROM categorias";
    $resultado = mysqli_query($conexao, $comando);
    $option = "";
    $cat=array();
    while($c = mysqli_fetch_assoc($resultado)){
            array_push($cat, $c);
        }

    foreach($cat as $c){
        $option .= "<option value='".$c['idCategoria']."'>".$c['nome']."</option>";
    }
    return $option;
}
