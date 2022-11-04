<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Lista de Usuários</title>


     <script language="Javascript">
function confirmacao(id) {
     var resposta = confirm("Deseja remover esse registro?");
     if (resposta == true) {
          window.location.href = "deleta.php?idUsuario="+id;
     }
}
</script>
 
</head>
<body>



<table id="myTable" class="display">
<?php

include("./conexao/conexao.php"); 
$pdo=conectar();

$sql = "SELECT idUsuario, nomeUsuario, emailUsuario FROM tblUsuario where ativo=1";
$stmt=$pdo->prepare($sql);
$stmt->execute();



if ($stmt->rowCount() > 0) {
  echo "<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>        
        <th>Email</th
      </tr>        
      </thead>
    <tbody>";
  
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
        <td>".$row["idUsuario"]."</td>
        <td>".$row["nomeUsuario"]."</td>
        <td>".$row["emailUsuario"]."</td> 
        <td><a href='editar.php?idUsuario=".$row["idUsuario"]."'>Editar</a></td>
        <td><a href='javascript:func()' onclick='confirmacao(".$row["idUsuario"].")' >Excluir</a></td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

?>      
        
    </tbody>
</table>
</body>
</html>