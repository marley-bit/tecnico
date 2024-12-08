<!DOCTYPE html>
<html lang="ept-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrostylo.css">
    <title>cadastro login </title>
</head>
<body>

        <form method="POST" action="cadastra.php" action="login.php">
        <h2>CADASTRO DE LOGIN</h2>


            <label for="nome">Usuario</label><br>
            <input type="text" id="nome" name="nome" placeholder="Digite seu usuario" required><br>

            <label for="senha">Senha</label><br>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required><br>

            <label for="confirmaSenha">Confimar Senha</label><br>
            <input type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Confirme sua senha" required><br>

            <button type="submit" name="submit">Cadastrar</button>

        </form>
        
</body>
</html>
