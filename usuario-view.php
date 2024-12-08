<?php
session_start(); // Iniciar sessão para login

// Incluir configuração do banco de dados
include_once("config.php");


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>updates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Visualizar usuario
                            <a href="up_de_add.php" class="btn btn-danger float-end"></a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['nome'])){
                                $usuario_nome = mysqli_real_escape_string($conn,$_GET['nome']);
                                $sql = "SELECT * FROM usuarios WHERE nome='$usuario_nome'";
                                $query = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($query)>0){
                                    $usuario= mysqli_fetch_array($query);
                            ?>
       
                                <div class="mb-3">
                                    <label>Nome</label>
                                    <p class="form-control"></p>
                                    <?=$usuario['nome']?>
                                </div>
                                <div class="mb-3">
                                    <label>Senha</label>
                                    <p class="form-control"></p>
                                </div>
                                <?php
                            }else{
                                echo"<h5>Usuario nao encontrado</h5>";
                            } 
                        }              
                                ?>
                               
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

