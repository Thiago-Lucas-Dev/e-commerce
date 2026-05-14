<?php 

session_start();

require_once __DIR__ . "/../includes/init.php";


$dados = limparPost($_POST);

// =======================================================
// VARIAVEIS VINDAS DO POST 
// =======================================================

$nomeAdm  = $dados["nome-adm"];
$senhaAdm = $dados["senha-adm"];

// =======================================================
// VALIDAÇÕES
// =======================================================

$erros = [];

if (empty($nomeAdm)) {
    $erros[] = "Insira o usuário admin para realizar o login";
}

if (empty($senhaAdm)) {
    $erros[] = "Insira a senha admin para realizar o login";
}

if (!empty($erros)) {

    $_SESSION["erros"] = $erros;

    header("Location: ../frontend/login_adm.php");
    exit;
}

// =======================================================
// VERIFICAÇÃO SE E-MAIL DIGITADO EXISTE NO BANCO
// =======================================================

$stmt = $pdo->prepare("
                SELECT 
                    id,
                    nome,
                    senha
                FROM administradores
                WHERE nome = ?
");
$stmt->execute([$nomeAdm]);
$adm = $stmt->fetch();

// =======================================================
// VERIFICA USUARIO
// =======================================================

if (!$adm) {

    $_SESSION["erros"] = [
        "Usuário admin ou senha inválidos"
    ];

    header("Location: ../frontend/login_adm.php");
    exit;
}

// =======================================================
//  VERIFICA SENHA
// =======================================================

if (!password_verify($senhaAdm, $adm["senha"])) {

    $_SESSION["erros"] = [
        "Usuário admin ou senha inválidos"
    ];

    header("Location: ../frontend/login_adm.php");
    exit;
}

// LOGIN

$_SESSION["admin"] = [
    "id"    => $adm["id"],
    "nome"  => $adm["nome"]
];

$_SESSION['toast'] = "Logado como admin com sucesso!";

// =======================================================
// REDIRECIONA
// =======================================================

header("Location: ../frontend/index.php");
exit;   




