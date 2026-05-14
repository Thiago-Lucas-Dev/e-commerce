<?php 

session_start();

require_once __DIR__ . "/includes/init.php";


error_reporting(E_ALL);

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

// =======================================================
// VARIAVEIS VINDAS DO POST (CADASTRO.HTML)
// =======================================================

$dados = limparPost($_POST);

$nomeUsuario             = $dados["nome"];
$emailUsuario            = $dados["email"];
$senhaUsuario            = $dados["senha"];
$confirmarSenhaUsuario   = $dados["confirmarSenha"];

$erros   = [];
$sucesso = [];

if (!campoPreenchido($nomeUsuario)) {
    $erros[] = "Insira um nome de usuário";
}

if (!campoPreenchido($emailUsuario)) {
    $erros[] = "Insira um e-mail para cadastrar-se";
}

if (!campoPreenchido($senhaUsuario)) {
    $erros[] = "Insira uma senha para cadastrar-se";
}

if (!campoPreenchido($confirmarSenhaUsuario)) {
    $erros[] = "Confirme sua senha para cadastrar-se";
}

if ($senhaUsuario !== $confirmarSenhaUsuario){
    $erros[] = "Senhas não conferem";
}

if (strlen($senhaUsuario) < 6) {
    $erros[] = "Senha precisa contar no mínimo 6 caracteres";
}

if (strlen($confirmarSenhaUsuario) < 6) {
    $erros[] = "Senha precisa contar no mínimo 6 caracteres";
}

// =======================================================
// EXISTEM ERROS NAS VALIDAÇÕES ACIMA?
// =======================================================

if (!empty($erros)) {

    session_start();

    $_SESSION["erros"] = $erros;

    header("Location: ../frontend/cadastro.php");
    exit;

}

// =======================================================
// VALIDA SE EMAIL INSERIDO JÁ EXISTE NO BANCO
// =======================================================

$stmt = $pdo->prepare("
            SELECT id
            FROM usuarios
            WHERE email = ?
");
$stmt->execute([$emailUsuario]);
$usuario = $stmt->fetch();

if ($usuario) {
    $erros[] = "Este e-mail já está cadastrado";

       $_SESSION["erros"] = $erros;

    header("Location: ../frontend/cadastro.php");
    exit;
}

// =======================================================
// SALVA HASH DA SENHA
// =======================================================

$senhaHash = password_hash($senhaUsuario, PASSWORD_DEFAULT);

// =======================================================
// INSERT DADOS DO USUARIO NO BANCO
// =======================================================

$stmt = $pdo->prepare("
            INSERT INTO usuarios
            (nome, email, senha)
            VALUES (?, ?, ?)     
");
$stmt->execute([$nomeUsuario, $emailUsuario, $senhaHash]);

$_SESSION["sucesso"] = "Conta criada com sucesso";

header("Location: ../frontend/login.php");
exit;







