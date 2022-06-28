<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
        </head>
        
        <body>
        
        <div class='container'>
          <div class='card'>
            <h1> Cadastrar</h1>
            
           
            <form action="php/CadastroClienteForm.php" method="POST" >
                    <div class="label-float">
                       <input type="text" id="nome"name="nome" placeholder=" " required>
                       <label id="labelNome" for="nome">Nome</label>
                    </div>
        
                    <div class="label-float">
                       <input type="email" id="email" name="email" placeholder=" " required>
                       <label id="labelEmail" for="email">E-mail</label>
                    </div>

                    <div class="label-float">
                     <input type="text" id="cpf" name="cpf" placeholder=" " required>
                     <label id="labelcpf" for="cpf">CPF</label>
                  </div>

                  <div class="label-float">
                     <input type="text" id="telefone" name="telefone" placeholder=" " required>
                     <label id="labeltelefone" for="telefone">telefone</label>
                  </div>

                  <div class="label-float">
                     <input type="text" id="cep" name="cep" placeholder=" " required>
                     <label id="labelcep" for="cep">CEP</label>
                  </div>

                  <div class="label-float">
                     <input type="text" id="nrcasa" name="nrcasa" placeholder=" " required>
                     <label id="labelnrcasa" for="nrcasa">Numero da casa</label>
                  </div>
                    
                    <div class="label-float">
                       <input type="password" id="senha" placeholder=" " required>
                       <label id="labelSenha" for="senha">Senha</label>
                       <i id="verSenha" class="fa fa-eye" aria-hidden="true"></i>
                       
                    </div>
        
                  
                    
                    <div class='justify-center'>
                       <button>Cadastrar</button>
                    </div>
          </div>
          </div>
          </form>
          <br>
          <h3>Já tem conta.<a href="login.php">Clique aqui</a></h3>
          <script src="js/app.js"></script>
        </body>
</html>