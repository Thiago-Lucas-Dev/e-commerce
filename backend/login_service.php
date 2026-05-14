<?php 

session_start();

require_once __DIR__ . "/../includes/init.php";


$dados = limparPost($_POST);

// =======================================================
// VARIAVEIS VINDAS DO POST 
// =======================================================

$emailUsuario = $dados["email"];
$senhaUsuario = $dados["senha"];

// =======================================================
// VALIDAÇÕES
// =======================================================

$erros = [];

if (empty($emailUsuario)) {
    $erros[] = "Insira um e-mail para realizar o login";
}

if (empty($senhaUsuario)) {
    $erros[] = "Insira a senha para realizar o login";
}

if (!empty($erros)) {

    $_SESSION["erros"] = $erros;

    header("Location: ../frontend/login.php");
    exit;
}

// =======================================================
// VERIFICAÇÃO SE E-MAIL DIGITADO EXISTE NO BANCO
// =======================================================

$stmt = $pdo->prepare("
                SELECT 
                    id,
                    nome,
                    email,
                    senha
                FROM usuarios
                WHERE email = ?
");
$stmt->execute([$emailUsuario]);
$usuario = $stmt->fetch();

// =======================================================
// VERIFICA USUARIO
// =======================================================

if (!$usuario) {

    $_SESSION["erros"] = [
        "E-mail ou senha inválidos"
    ];

    header("Location: ../frontend/login.php");
    exit;
}

// =======================================================
//  VERIFICA SENHA
// =======================================================

if (!password_verify($senhaUsuario, $usuario["senha"])) {

    $_SESSION["erros"] = [
        "E-mail ou senha inválidos"
    ];

    header("Location: ../frontend/login.php");
    exit;
}

// LOGIN

$_SESSION["usuario"] = [
    "id"    => $usuario["id"],
    "nome"  => $usuario["nome"],
    "email" => $usuario["email"]
];

$_SESSION['toast'] = "Logado com sucesso!";

// =======================================================
// REDIRECIONA
// =======================================================

header("Location: ../frontend/index.php");
exit;   




