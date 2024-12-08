<?php
session_start();
include_once("config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Usuário
                            <a href="up_de_add.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['nome'])) {
                            $usuario_nome = mysqli_real_escape_string($conn, $_GET['nome']);
                            $sql = "SELECT * FROM usuarios WHERE nome='$usuario_nome'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $usuario = mysqli_fetch_assoc($result);
                        ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="usuario_nome" value="<?= htmlspecialchars($usuario['nome']); ?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']); ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Senha (Deixe em branco para não alterar)</label>
                                <input type="password" name="senha" class="form-control">
                            </div>
                            <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                        </form>
                        <?php
                            } else {
                                echo "<h5>Usuário não encontrado.</h5>";
                            }
                        } else {
                            echo "<h5>Parâmetro inválido.</h5>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
