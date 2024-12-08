<?php
session_start();
include_once("config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php include('mensagem.php') ?>
                        <h4>Lista de Usuários
                            <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Senha (Hash)</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM usuarios";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($usuario = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?= htmlspecialchars($usuario['nome']); ?></td>
                                        <td><?= htmlspecialchars($usuario['senha']); ?></td>
                                        <td>
                                            <a href="usuario-edit.php?nome=<?= urlencode($usuario['nome']); ?>" class="btn btn-success btn-sm">Editar</a>
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                <input type="hidden" name="delete_usuario" value="<?= htmlspecialchars($usuario['nome']); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Nenhum usuário encontrado.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
