
<?php

//Se tiver postagem faça 
if(count($_POST) > 0) {

  //Conexão com o banco
    include('conexao.php');
    
    $erro = false;
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cargo = $_POST['cargo'];
    $email = $_POST['email'];
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];


    if(empty($nome)) {
        
      ?>
      <script>
        alert("Preencha o nome");
      </script>
      
      <?php
    }
    
    
    else if(empty($sobrenome)) {
        ?>
        <script>
          alert("Preencha o sobrenome");
        </script>
        
        <?php
    }

    else {//Inserir na tabela do banco 
        $sql_code = "INSERT INTO port (nome, sobrenome, email, cargo, datae, placa, modelo,cor) 
        VALUES ('$nome','$sobrenome','$email','$cargo', now(),'$placa', '$modelo','$cor')";
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
            
        if($deu_certo) {
              ?>
                <script>alert("Cadastrado com Sucesso!");</script>
              
            <?php

            unset($_POST);
        }
    }

}
?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../style/estilo.css"> 
  <title>Cadastro Gestor</title>
</head>
</html>
<body>
    <center>
    <div class ="row">
	
    <div class="col-md-6 mx-auto p-0">
		<div class="card">
        <h3 style="color: black;">Cadastro Gestor</h3>	
    <div class="login-box">
	<div class="login-snip">

    
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">ENTRADA</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">VEICULO</label>
		<div class="login-space">
			<div class="login">
            <form method="POST" action="">	
            <div class="group">
					<label  class="label">NOME</label>
					<input id="user" type="text" class="input" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" name="nome">
				</div>
				<div class="group">
					<label for="pass" class="label">SOBRENOME</label>
					<input id="pass" value="<?php if(isset($_POST['sobrenome'])) echo $_POST['sobrenome']; ?>" name="sobrenome" type="text" class="input">
				</div>
                <div class="group">
					<label for="pass" class="label">CARGO</label>
					<input id="pass"value="<?php if(isset($_POST['cargo'])) echo $_POST['cargo']; ?>" name="cargo" type="text"  class="input"  >
				</div>
                <div class="group">
					<label for="pass" class="label">email</label>
					<input id="pass"  value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" type="text" class="input"  >
				</div>
          
				<a href="../leitura/leituragestor.php">Voltar para a lista</a>    
			</div>
			<div class="sign-up-form">
				<div class="group">
					<label for="user" class="label">PLACA</label>
					<input id="user" value="<?php if(isset($_POST['placa'])) echo $_POST['placa']; ?>" name="placa" type="text" class="input" >
				</div>
				<div class="group">
					<label for="pass" class="label">MODELO</label>
					<input id="pass" value="<?php if(isset($_POST['modelo'])) echo $_POST['modelo']; ?>" name="modelo" type="text" class="input" >
				</div>
				<div class="group">
					<label for="pass" class="label">COR</label>
					<input id="pass" value="<?php if(isset($_POST['cor'])) echo $_POST['cor']; ?>" name="cor" type="text" class="input"   >
				</div>
				<div class="group">
					<input type="submit" class="button" value="ENTRADA">
				</div>
			
				</form>
                
            
            </div>
		</div>
	</div>
</div>   
</div>
</div>
</div>
</center>

</body>
</html>
