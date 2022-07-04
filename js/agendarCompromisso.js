function adicionarProdutos(){       
    var novoProduto = $("#produtos").children().first().clone();   
    $("#produtos").append(novoProduto);   
}

/**Função para o Agendar Compromissos */
function removerProduto(botao){    
   var quantidadeProduto= document.getElementById("produtos").childElementCount;
   if(quantidadeProduto==1){
        alert("o último produto não pode ser removida");
    }else{
        $(botao).parent().parent().remove();
    }    
}






