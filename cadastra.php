<?php
// criar c0onexao

include_once("config.php");
if(!$conn){

    echo"<p style='color:red; text-aling:center; font-size:25px;'>Erro de conexao</p>";
    echo"<h2 style = 'color:blue; text-align:center; font-size:25px'><a href='cadastropro.php'>VOLTAR</a></h2>";
}
//verificar se o formulario foi submetido
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //RECUPERA OS VALORES DO FORMULARIO

    $usuario = $_POST["nome"];
    $senha = $_POST["senha"];
    $confirmasenha = $_POST["confirmaSenha"];

//verificar se a senha e confimaçao sao iguais
if($senha === $confirmasenha){
    $sql = "SELECT * FROM usuarios WHERE nome = '$usuario'";
    $retorno = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($retorno);

    if($row){
        echo"<p style='color:red; text-aling:center; font-size:25px;'>Usuario JA Existe</p>";
        echo"<h2 style = 'color:blue; text-align:center; font-size:25px'><a href='cadastropro.php'>VOLTAR</a></h2>";
    }else{
        //CRIPTOGRAFANDO A SENHA 
        $hashsenha = password_hash($senha, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuarios (nome, senha) values('$usuario','$hashsenha')";
        $retorno = mysqli_query($conn, $sql);

        if($retorno === true){
             
             echo"<script>";
             echo"alert('CADASTRO REALIZADO COM SUCESSO')";
             echo"</script>";
             header('location: login.php');
        }else{
            echo"ERRO AO CADASTRA USUARIO:". $conn->error;
        }
    }

}else{
    echo"<p style='color:blue; text-aling:center; font-size:25px;'>AS senhas nao coincidem!</p>";
echo"<h2 style = 'color:blue; text-align:center; font-size:25px'><a href='cadastropro.php'>VOLTAR</a></h2>";
}






}



?>
<style>
    p,h2{
        padding: 8px;
    text-align: center;
    color:red;
    }
</style>