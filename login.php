<?php
session_start(); // Iniciar sessão para login

// Incluir configuração do banco de dados
include_once("config.php");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar dados do formulário com proteção contra SQL Injection
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $senha = $_POST["senha"];

    // Verificar se os campos estão preenchidos
    if (!empty($nome) && !empty($senha)) {
        // Consultar o banco de dados para verificar usuário
        $sql = "SELECT * FROM usuarios WHERE nome = '$nome'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $usuario = mysqli_fetch_assoc($result);

            // Verificar a senha usando password_verify
            if (password_verify($senha, $usuario['senha'])) {
                // Iniciar sessão e redirecionar
                $_SESSION['nome'] = $usuario['nome'];
                header("Location: index.php");
                exit;
            } else {
                $erro = "Senha incorreta!";
            }
        } else {
            $erro = "Usuário não encontrado!";
        }
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: darkgrey;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            width: 400px;
            padding: 20px;
            background-color: rgb(204, 204, 204);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: rgba(128, 128, 128, 0.2);
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: rgb(0, 60, 255);
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(0, 42, 179);
            transform: scale(1.05);
            transition: 0.3s;
        }
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h2>Login</h2>
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" placeholder="Digite seu usuário" required>
        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
        <button type="submit">Login</button>
        <p><a href="cadastropro.php">Ainda não é cadastrado? Clique aqui!</a></p>
        <?php if (isset($erro)) echo "<p class='error'>$erro</p>"; ?>
    </form>
</body>
</html>
