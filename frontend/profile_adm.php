<?php

require_once __DIR__ . "/../includes/header.php";

// =======================================================
// VERIFICA SE ADMIN ESTÁ LOGADO
// =======================================================

if (!isset($_SESSION["admin"])) {

    header("Location: login_adm.php");
    exit;
}

?>

<body>

    <?php require_once __DIR__ . "/../includes/topbar.php"; ?>

    <main class="perfil-main">

        <section class="perfil-card admin-card">

            <div class="perfil-topo">

                <div class="perfil-avatar admin-avatar">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>

                <div class="perfil-info-principal">
                    <h1>Painel do Administrador</h1>
                    <p>Gerencie sua conta administrativa</p>
                </div>

            </div>

            <div class="perfil-conteudo">

                <div class="perfil-item">

                    <span class="perfil-label">
                        <i class="fa-solid fa-user-shield"></i>
                        Administrador
                    </span>

                    <p class="perfil-valor">
                        <?= $_SESSION["admin"]["nome"] ?? "Administrador"; ?>
                    </p>

                </div>

                <div class="perfil-item">

                    <span class="perfil-label">
                        <i class="fa-solid fa-calendar"></i>
                        Criado em
                    </span>

                    <p class="perfil-valor">
                        <?= date("d/m/Y H:i"); ?>
                    </p>

                </div>

            </div>

            <div class="perfil-acoes">

                <a href="adicionar_produto.php" class="btn-perfil">
                    <i class="fa-solid fa-plus"></i>
                    Adicionar Produto
                </a>

                <a href="painel_admin.php" class="btn-perfil">
                    <i class="fa-solid fa-chart-line"></i>
                    Painel Admin
                </a>

                <a href="../backend/logout.php" class="btn-perfil sair">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sair da Conta
                </a>

            </div>

        </section>

    </main>

    <footer>

        <i class="fa-solid fa-gamepad footer-icon"></i>

        <a class="info-footer" href="#">Sobre</a>
        <a class="info-footer" href="#">Contato</a>
        <a class="info-footer" href="#">Política de Privacidade</a>

    </footer>

    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/dropdown.js"></script>

</body>

</html>