<?php 
session_start();
require 'config.php';

if(isset($_POST['create_usuario'])){
    $nome= mysqli_real_escape_string($conn, trim($_POST['nome']));
    $senha= isset($_POST['senha'])? mysqli_real_escape_string($conn, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';

    $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$nome','$senha')";

    mysqli_query($conn,$sql);
     
    if(mysqli_affected_rows($conn)>0){
        $_SESSION ['mensagem'] = 'Usuario criado com sucesso';
        header('Location: up_de_add.php');
        exit;
    }else{
        $_SESSION ['mensagem'] = 'Usuario nao foi criado';
        header('Location: up_de_add.php');
        exit;
    }

}



if (isset($_POST['update_usuario'])) {
    $usuario_nome = mysqli_real_escape_string($conn, $_POST['usuario_nome']);
    $novo_nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $nova_senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : null;

    $sql = "UPDATE usuarios SET nome='$novo_nome'";
    if ($nova_senha) {
        $sql .= ", senha='$nova_senha'";
    }
    $sql .= " WHERE nome='$usuario_nome'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['mensagem'] = "Usuário atualizado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar: " . mysqli_error($conn);
    }
    header("Location: up_de_add.php");
    exit();
}




if(isset($_POST['delete_usuario'])){
    $usuario_id =mysqli_real_escape_string($conn, $_POST['delete_usuario']);
    
    $sql="DELETE FROM usuarios WHERE nome='$usuario_id'";
    
    mysqli_query($conn,$sql);

    if(mysqli_affected_rows($conn) > 0){
        $_SESSION['mensagem'] ='Usuario deletado com sucesso';
        header('Location: up_de_add.php');
        exit;
    }else{
        $_SESSION['mensagem'] ='Erro ao Deletar Usuario ';
        header('Location: up_de_add.php');
        exit;
    }

}

?>