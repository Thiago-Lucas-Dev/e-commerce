<?php

require_once __DIR__ . "/../includes/init.php";

$dados = limparPost($_POST);

$nomeProduto  = $dados["produto-nome"];
$precoProduto = $dados["produto-preco"];

// =======================================================
// IMAGEM
// =======================================================

$imagem = $_FILES["imagem"] ?? null;

// =======================================================
// VALIDAÇÕES
// =======================================================

$erros = [];

if (empty($nomeProduto)) {
    $erros[] = "Digite o nome do produto";
}

if (strlen($nomeProduto) > 100) {
    $erros[] = "O nome do produto deve ter no máximo 100 caracteres";
}

if (empty($precoProduto)) {
    $erros[] = "Digite o preço do produto";
}

if (!is_numeric($precoProduto)) {
    $erros[] = "Preço inválido";
}

if ($precoProduto < 0) {
    $erros[] = "O preço não pode ser negativo";
}

// =======================================================
// VALIDAÇÃO IMAGEM
// =======================================================

if (
    $imagem &&
    $imagem["error"] !== UPLOAD_ERR_NO_FILE
) {

    $extensao = strtolower(
        pathinfo($imagem["name"], PATHINFO_EXTENSION)
    );

    $extensoesPermitidas = [
        "jpg",
        "jpeg",
        "png",
        "webp"
    ];

    if (!in_array($extensao, $extensoesPermitidas)) {
        $erros[] = "Formato de imagem inválido";
    }

    // 5MB
    if ($imagem["size"] > 5 * 1024 * 1024) {
        $erros[] = "A imagem deve ter no máximo 5MB";
    }
}


// =======================================================
// SE EXISTIR ERROS
// =======================================================

if (!empty($erros)) {

    $_SESSION["erros"] = $erros;

    header("Location: ../frontend/adicionar_produto.php");
    exit;
}

// =======================================================
// FORMATANDO PREÇO
// =======================================================

$precoProduto = number_format((float)$precoProduto, 2, '.', '');

// =======================================================
// UPLOAD DA IMAGEM
// =======================================================

// =======================================================
// UPLOAD DA IMAGEM
// =======================================================

if (
    $imagem &&
    $imagem["error"] !== UPLOAD_ERR_NO_FILE
) {

    $novoNomeImagem = uniqid() . "." . $extensao;

    $caminhoImagem = __DIR__ . "/../uploads/" . $novoNomeImagem;

    move_uploaded_file(
        $imagem["tmp_name"],
        $caminhoImagem
    );
}

// =======================================================
// INSERT NO BANCO
// =======================================================

$stmt = $pdo->prepare("
    INSERT INTO produtos (
        produto,
        preco,
        imagem
    ) VALUES (
        ?,
        ?,
        ?
    )
");

$produtoCadastrado = $stmt->execute([
    $nomeProduto,
    $precoProduto,
    $novoNomeImagem
]);

// =======================================================
// VERIFICA INSERT
// =======================================================

if (!$produtoCadastrado) {

    $_SESSION["erros"] = [
        "Erro ao cadastrar produto"
    ];

    header("Location: ../frontend/adicionar_produto.php");
    exit;
}

// =======================================================
// SUCESSO
// =======================================================

toast("Produto cadastrado com sucesso!");

header("Location: ../frontend/gerenciar_produtos.php");
exit;
