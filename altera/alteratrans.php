<?php
//Incluir a conexão com o banco
include('../conexoes/conexao3.php');

$id = intval($_GET['id']);
//Enquanto tiver postagem faça 
if(count($_POST) > 0) {
    
    include('../conexoes/conexao3.php');
    
    $erro = false;
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $placa = $_POST['placa'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    
    if(empty($nome)) {
        ?>
        <script>
            alert("Preencha o nome!");
        </script>
       <?php
    }
 
    else if($erro) {
        echo "<p><b>ERRO: $erro</b></p>";
    } else {
        //Atualizar a tabela do banco de dados 
        $sql_code = "UPDATE port
        SET nome = '$nome', 
        cnpj = '$cnpj', 
        telefone = '$telefone',
        email = '$email',
        endereco = '$endereco',
        placa = '$placa',
        modelo = '$modelo',
        cor = '$cor',
        datas = now()
        WHERE id = '$id'";
        
        $deu_certo = $mysqli->query($sql_code) or die($mysqli->error);
        if($deu_certo) {
            ?>
            <script>
                alert("Saída guardada com sucesso!");
            </script>
           <?php
            unset($_POST);
        }
    }

}
//Mostrando os clientes do banco de dados 
$sql_cliente = "SELECT * FROM port WHERE id = '$id'";
$query_cliente = $mysqli->query($sql_cliente) or die($mysqli->error);
$cliente = $query_cliente->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../style/estilo.css"> 
  <title>Altera Transportadora</title>
</head>
<body>
    <center>
    <div class ="row">
	
    <div class="col-md-6 mx-auto p-0">
		<div class="card">
        <h3 style="color: black;">Altera Transportadora</h3>	
        <div class="login-box">
	<div class="login-snip">

    
    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">ENTRADA</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">VEICULO</label>
		<div class="login-space">
			<div class="login">
            <form method="POST" action="">
            <div class="group">
					<label  class="label">NOME</label>
					<input id="user" type="text" class="input" value="<?php echo $cliente['nome']; ?>" name="nome">
				</div>
				<div class="group">
					<label for="pass" class="label">CNPJ</label>
					<input id="pass" value="<?php echo $cliente['cnpj']; ?>" name="cnpj" type="text" class="input">
				</div>
                <div class="group">
					<label for="pass" class="label">TELEFONE</label>
					<input id="pass"value="<?php echo $cliente['telefone']; ?>" name="telefone" type="text"  class="input"  >
				</div>
                <div class="group">
					<label for="pass" class="label">EMAIL</label>
					<input id="pass"  value="<?php echo $cliente['email']; ?>" name="email" type="text" class="input"  >
				</div>
                <div class="group">
					<label for="pass" class="label">ENDERECO</label>
					<input id="pass" class="input"   value="<?php echo $cliente['endereco']; ?>" name="endereco" type="text">
				</div>
				<a href="../leitura/leituratrans.php">Voltar para a lista</a>    
			</div>
			<div class="sign-up-form">
				<div class="group">
					<label for="user" class="label">PLACA</label>
					<input id="user" value="<?php echo $cliente['placa']; ?>" name="placa" type="text" class="input" >
				</div>
				<div class="group">
					<label for="pass" class="label">MODELO</label>
					<input id="pass" value="<?php echo $cliente['modelo']; ?>" name="modelo" type="text" class="input" >
				</div>
				<div class="group">
					<label for="pass" class="label">COR</label>
					<input id="pass" value="<?php echo $cliente['cor']; ?>" name="cor" type="text" class="input"   >
				</div>
				<div class="group">
					<input type="submit" class="button" value="SAÍDA">
				</div>
			
                </form>	
                
            </div>
        </form>
        </div>
	
    </div>
</div>   
</div>
</div>
</div>
</center>

</body>
</html>