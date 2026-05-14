<?php

// <!--================================
//     CONEXÃO COM BANCO DE DADOS
// =================================-->

$hostname = "localhost";
$dbname   = "pimstore_ecommerce";
$username = "root";
$password = "";

try {
    // Criando conexão usando PDO

    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8mb4", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    
    $e->getMessage();

    echo "Erro ao conectar banco de dados";
}