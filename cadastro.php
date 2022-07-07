<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Cadastrar</title>
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
        </head>

        <div id="alertas">

    <?php if(isset($_GET['retorno'])==true && $_GET['retorno']==0){ ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <span>Houve algum problema cadastrar o cliente!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php } ?>    
        <body>
        
        <div class='container'>
          <div class='card'>
            <h1> Cadastrar</h1>
            
           
            <form action="php/cadastroCliente.php" method="POST" >
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
                       <input type="password" id="senha" name="senha" placeholder=" " required>
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