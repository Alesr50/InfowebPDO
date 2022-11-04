<?php


echo $id        = $_POST["id"];
echo $nome      = $_POST["nome"];
echo $email     = $_POST["email"];
echo $senha     = $_POST["senha"];

// Criando conexão
include("./conexao/conexao.php");
$pdo = conectar();
$sql = 'UPDATE tblUsuario SET  nomeUsuario=?, emailUsuario=? ,senhaUsuario=? WHERE idUsuario = ?';
$dados = [$nome, $email,$senha,$id];
$stmt = $pdo->prepare($sql);


if ($stmt->execute($dados)) {
  echo "Registro Editado";
  header("Location: listar.php");
} else {
  echo "Error: " . $sql . "<br>" ;
}

?>