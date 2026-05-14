<?php

// =======================================================
// FUNÇÃO LIMPAR POST, RECEBE POST E FAZ LIMPEZA 
// =======================================================

function limparPost($postArray)
{
    $limpo = [];

    foreach ($postArray as $chave => $valor) {

        if (is_array($valor)) {
            $limpo[$chave] = limparPost($valor);
        } else {
            $limpo[$chave] = trim($valor);
        }
    }

    return $limpo;
}

// =======================================================
// FUNÇÃO PARA VERIFICAR SE O CAMPO VINDO DO POST FOI PREENCHIDO
// =======================================================

function campoPreenchido($campo)
{
    return isset($campo) && trim($campo) !== '';
}

// =======================================================
// FUNÇÃO PARA FORMATAR VALOR R$
// =======================================================

function formatarMoeda($valor)
{
    return 'R$ ' . number_format((float)$valor, 2, ',', '.');
}

// =======================================================
// FUNÇÃO TOAST 
// =======================================================

function toast($mensagem)
{
    $_SESSION["toast"] = $mensagem;
}
