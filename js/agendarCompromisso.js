function adicionarProdutos(){       
    var novoProduto = $("#produtos").children().first().clone();   
    $("#produtos").append(novoProduto);   
}

/**Função para comprar produtos */
function removerProduto(botao){    
   var quantidadeProduto= document.getElementById("produtos").childElementCount;
   if(quantidadeProduto==1){
        alert("o último produto não pode ser removido");
    }else{
        $(botao).parent().parent().remove();
    }    
}






