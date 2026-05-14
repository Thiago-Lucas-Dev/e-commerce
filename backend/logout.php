<?php

session_start();

// mensagem do toast
$_SESSION['toast'] = "Você foi desconectado com sucesso!";

// remove dados do usuário / quebra sessão
unset($_SESSION['usuario']);
unset($_SESSION["admin"]);

// redireciona
header("Location: ../frontend/index.php");
exit;