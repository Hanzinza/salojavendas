<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
        </head>
        
        <body>
        <form action="php/autenticacao.php" method="POST">
        <div class='container'>
          <div class='card'>
            <h1> Login </h1>
            
            <div id='msgError'></div>
            <div id='msgSuccess'></div>
            
                    <div class="label-float">
                       <input type="email" id="email" name="email" placeholder=" " required>
                       <label id="labelNome" for="nome">Email</label>
                    </div>
        
                    
                    <div class="label-float">
                       <input type="password" id="senha" name="senha" placeholder=" " required>
                       <label id="labelSenha" for="senha">Senha</label>
                       <i id="verSenha" class="fa fa-eye" aria-hidden="true"></i>
                       
                    </div>
        
                    
                    <div class='justify-center'>
                       <button>Entrar</button>
                    </div>
        
            
          </div>
          </div>
         </form>
          <br>
          <h3>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></h3>
          <script src="js/app.js"></script>
        </body>
</html>
