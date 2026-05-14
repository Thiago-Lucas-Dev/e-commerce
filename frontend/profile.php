<?php 

require_once __DIR__ . "/../includes/header.php";

?>

<body>

    <?php require_once __DIR__ . "/../includes/topbar.php"; ?>

    <main class="perfil-main">

        <section class="perfil-card">

            <div class="perfil-topo">
                <div class="perfil-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="perfil-info-principal">
                    <h1>Meu Perfil</h1>
                    <p>Gerencie suas informações da conta</p>
                </div>
            </div>

            <div class="perfil-conteudo">

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="fa-solid fa-user"></i>
                        Nome
                    </span>

                    <p class="perfil-valor">
                        <?= $_SESSION['usuario_nome'] ?? 'Usuário'; ?>
                    </p>
                </div>

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="bi bi-lock-fill"></i>
                        Senha
                    </span>

                    <p class="perfil-valor">
                        <?= $_SESSION['usuario_nome'] ?? 'Usuário'; ?>
                    </p>
                </div>

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="fa-solid fa-envelope"></i>
                        E-mail
                    </span>

                    <p class="perfil-valor">
                        <?= $_SESSION['usuario_email'] ?? 'email@exemplo.com'; ?>
                    </p>
                </div>

                <div class="perfil-item">
                    <span class="perfil-label">
                        <i class="fa-solid fa-calendar"></i>
                        Conta criada
                    </span>

                    <p class="perfil-valor">
                        13/05/2026
                    </p>
                </div>

            </div>

            <div class="perfil-acoes">
                <a href="editar-perfil.php" class="btn-perfil">
                    <i class="fa-solid fa-pen"></i>
                    Editar Perfil
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