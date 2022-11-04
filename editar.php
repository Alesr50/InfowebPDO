<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Editar Usuário</title>
</head>

<body>


    <?php

    $id = $_GET["idUsuario"];



    include("./conexao/conexao.php");
    $pdo = conectar();

    $sql = "SELECT idUsuario, nomeUsuario,loginUsuario, emailUsuario,senhaUsuario FROM tblUsuario WHERE idUsuario= ?";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(1, $id);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id        = $row["idUsuario"];
        $nome      = $row["nomeUsuario"];
        $login      = $row["loginUsuario"];
        $email = $row["emailUsuario"];
        $senha = $row["senhaUsuario"];
    }

    ?>


    <div class="container">
        <form action="edita.php" method="post">
            <p>Editar Cadastro</p>


            <div class="field">
                <label>ID</label>
                <input type="number" name="id" id="id" value="<?php echo $id; ?>" min="1" readonly>
            </div>
            <div class="field">
                <label>Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" required>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="field">
                <label>Login</label>
                <input type="text" name="login" id="login" value="<?php echo $login; ?>" required>
            </div>

            <div class="field">
                <label>Senha</label>
                <input type="password" name="senha" id="senha" value="<?php echo $senha; ?>" required>
            </div>
            <button type="submit" id="button" class="button" <?php echo "onclick=window.location.href=edita.php?=" . $id . ";"  ?>>Editar</button>
        </form>

    </div>

</body>

</html>