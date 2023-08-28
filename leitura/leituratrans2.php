<?php 
//Conectando o banco de dados
include('conexao3.php');

$nome = $_POST['pesquisar'];
$cnpj = $_POST['cnpj'];
$data = $_POST['data'];

$sql_clientes = "SELECT * FROM port WHERE nome = '$nome' or cnpj = '$cnpj' or (datae>='$data 01:00:00' and datae<='$data 20:56:00')";
#$sql_clientes = "SELECT * FROM port WHERE datae>='$data 01:00:00' and datae<='$data 20:56:00'";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$num_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Transportadora</title>
</head>
<body>
    
    <center>
    <h1>Lista de Transportadora</h1>
    
    <a href="leituratrans.php">Voltar para a lista</a>

    <p>Estes são as transportadoras cadastrados no seu sistema:</p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>CNPJ</th>
            <th>TELEFONE</th>
            <th>EMAIL</th>
            <th>ENDERECO</th>
            <th>ENTRADA</th>
            <th>PLACA</th>
            <th>MODELO</th>
            <th>COR</th>
            <th>SAIDA</th>
            <th>AÇOES</th>
        </thead>
        <tbody>
            <?php if($num_clientes == 0) { ?>
                <tr>
                    <td colspan="7">Nenhuma transportadora foi cadastrada</td>
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
                    <td><?php echo $cliente['cnpj']; ?></td>
                    <td><?php echo $cliente['telefone']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['endereco']; ?></td>
                    <td><?php echo $cliente['placa']; ?></td>
                    <td><?php echo $cliente['modelo']; ?></td>
                    <td><?php echo $cliente['cor']; ?></td>
                    <td><?php echo $data_cadastro; ?></td>
                    <td><?php echo $data_cadastro2; ?></td>
                    <td>
                        <a href="../altera/alteratrans.php?id=<?php echo $cliente['id']; ?>">SAÍDA</a>
                       
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