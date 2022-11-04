<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel ADM</title>
</head>

<body>
    <p>OI <?php
    session_cache_expire(1);
    session_start();
    echo strtoupper($_SESSION['usuario']); ?> </p>
</body>

</html>