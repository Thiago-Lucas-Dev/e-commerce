<?php

require_once __DIR__ . "/../includes/init.php";

$dados = limparPost($_POST);

$nomeAdm           = $dados["nome-adm"];
$senhaAdm          = $dados["senha-adm"];
$confirmarSenhaAdm = $dados["confirmar-senha-adm"];

$erros = [];

// =======================================================
// VALIDAÇÕES
// =======================================================

if (empty($nomeAdm)) {
    $erros[] = "Insira o nome para o usuário admin";
}

if (empty($senhaAdm)) {
    $erros[] = "Insira uma senha para o usuário admin";
}

if (empty($confirmarSenhaAdm)) {
    $erros[] = "Confirme a senha para o usuário admin";
}

if ($senhaAdm !== $confirmarSenhaAdm) {
    $erros[] = "As senhas não conferem";
}

if (strlen($senhaAdm) < 6) {
    $erros[] = "Senha precisa contar no mínimo 6 caracteres";
}

if (strlen($confirmarSenhaAdm) < 6) {
    $erros[] = "Senha precisa contar no mínimo 6 caracteres";
}




// =======================================================
// VERIFICA SE TEM USUARIO COM NOME INSERIDO NO BANCO 
// =======================================================

$stmt = $pdo->prepare("
            SELECT id 
            FROM administradores
            WHERE nome = ?
");
$stmt->execute([$nomeAdm]);
$adm = $stmt->fetch();


if ($adm) {
    $erros[] = "Este usuário admin já está cadastrado";

       $_SESSION["erros"] = $erros;

    header("Location: ../frontend/cadastro_adm.php");
    exit;
}

// =======================================================
// SALVA HASH DA SENHA
// =======================================================

$senhaHash = password_hash($senhaAdm, PASSWORD_DEFAULT);

// =======================================================
// INSERT DE DADOS NO BANCO 
// =======================================================

$stmt = $pdo->prepare("
            INSERT INTO administradores
            (nome, senha)
            VALUES (?, ?)
");
$stmt->execute([$nomeAdm, $senhaHash]);

toast("Conta admin criada com sucesso");

header("Location: ../frontend/login_adm.php");
exit;