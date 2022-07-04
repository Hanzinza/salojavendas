function adicionarPessoa(){       
    var novaPessoa = $("#pessoasDoCompromisso").children().first().clone();   
    $("#pessoasDoCompromisso").append(novaPessoa);   
}

/**Função para o Agendar Compromissos */
function removerPessoa(botao){    
   var quantidadePessoas= document.getElementById("pessoasDoCompromisso").childElementCount;
   if(quantidadePessoas==1){
        alert("A última pessoa não pode ser removida");
    }else{
        $(botao).parent().parent().remove();
    }    
}






