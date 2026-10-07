<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "site";
$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

$n = $_POST['nome'];
$e = $_POST['email'];
$comando = "SELECT `nome` FROM `usuarios` WHERE `nome`='$n' AND `email`='$e'";

$stm = $conexao->prepare($comando);
$stm->execute();

if($resultado = $stm->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION['nome'] = $resultado['nome'];
    echo "Login correto! <a href='perfil.php'>Ir para o perfil</a>";
} else {
    echo "Dados incorretos, tente novamente.";
}
$conexao = null;
?>
