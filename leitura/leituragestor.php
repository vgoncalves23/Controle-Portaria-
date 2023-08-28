<?php 
//Conectando o banco de dados
include('../conexoes/conexao.php');

//Mostrando a tabela do banco de dados 
$sql_clientes = "SELECT * FROM port";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Gestor</title>
</head>
<body>
<center>
<h1>Lista de Gestores</h1>
    <p>
        
        <br>
        <a href="./login.html">TELA INICIAL</a>

    </p>
    <form action="leituragestor2.php" method="POST">
    <label>Nome</label>
        <br>    
        <input type="text" name="pesquisar">
        <br>
        <label>Sobrenome</label>
        <br>
        <input type="text" name="sobrenome">
        <br>
        <label>Data</label>
        <br>
        <input type="date" name="data">
        <br><br>
        <button type="text">Enviar</button>
    </form>

    <p>Estes são os gestores cadastrados no seu sistema:</p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>SOBRENOME</th>
            <th>CARGO</th>
            <th>EMAIL</th>
            <th>PLACA</th>
            <th>MODELO</th>
            <th>COR</th>
            <th>ENTRADA</th>
            <th>SAÍDA</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            <?php if($num_clientes == 0) { ?>
                <tr>
                    <td colspan="7">Nenhum gestor foi cadastrado</td>
                </tr>
            <?php 
            } else {
                while ($cliente = $query_clientes->fetch_assoc()) {
                
             
                $data_cadastro = date("d/m/Y H:i", strtotime($cliente['datae']));
                $data_cadastro2 = date("d/m/Y H:i", strtotime($cliente['datas']));
                ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nome']; ?></td>
                    <td><?php echo $cliente['sobrenome']; ?></td>
                    <td><?php echo $cliente['cargo']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['placa']; ?></td>
                    <td><?php echo $cliente['modelo']; ?></td>
                    <td><?php echo $cliente['cor']; ?></td>
                    <td><?php echo $data_cadastro; ?></td>
                    <td><?php echo $data_cadastro2; ?></td>
                    <td>
                        <a href="../altera/alteragestor.php?id=<?php echo $cliente['id']; ?>">SAÍDA</a>
                       
                    </td>
                </tr>
                <?php
                }
            } ?>
        </tbody>
    </table>
    </center>    
</body>
</html>