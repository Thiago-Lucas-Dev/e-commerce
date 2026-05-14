<?php

session_start();

$erros = $_SESSION['erros'] ?? [];

unset($_SESSION['erros']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../assets/css/cadastro.css">

    <title>Cadastro ADM | PIMSTORE</title>
</head>

<body>

    <header>
        <a class="nome" href="index.php">
            <span>PIM</span>STORE
        </a>
    </header>

    <main class="auth-page">

        <section class="auth-card register-card">

            <div class="user-icon">
                <i class="fa-solid fa-user-shield"></i>
            </div>

            <div class="auth-title">

                <h1>
                    Cadastro <span>Administrativo</span>
                </h1>

                <p>
                    Crie uma conta administrativa para acessar
                    o painel de gerenciamento da plataforma.
                </p>

            </div>

            <form
                class="cadastro"
                action="../backend/cadastro_adm_service.php"
                method="post">

                <label for="nome">
                    Nome do administrador
                </label>

                <div class="input-box">

                    <i class="fa-solid fa-user-tie"></i>

                    <input
                        type="text"
                        id="nome"
                        name="nome-adm"
                        placeholder="Nome do administrador"
                        autocomplete="name"
                        maxlength="80"
                        required>

                </div>

                <label for="senha">
                    Senha administrativa
                </label>

                <div class="input-box">

                    <i class="fa-solid fa-shield-halved"></i>

                    <input
                        type="password"
                        id="senha"
                        name="senha-adm"
                        placeholder="••••••••••"
                        autocomplete="new-password"
                        minlength="6"
                        maxlength="20"
                        required>

                    <button
                        class="show-password"
                        type="button"
                        aria-label="Mostrar senha"
                        data-target="senha">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>

                </div>

                <label for="confirmarSenha">
                    Confirmar senha
                </label>

                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input
                        type="password"
                        id="confirmarSenha"
                        name="confirmar-senha-adm"
                        placeholder="••••••••••"
                        autocomplete="new-password"
                        minlength="6"
                        maxlength="20"
                        required>

                    <button
                        class="show-password"
                        type="button"
                        aria-label="Mostrar senha"
                        data-target="confirmarSenha">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>

                </div>

                <?php if (!empty($erros)): ?>

                    <div class="box-erros">

                        <p class="erro">

                            <i class="bi bi-exclamation-triangle-fill"></i>

                            <?= $erros[0]; ?>

                        </p>

                    </div>

                <?php endif; ?>

                <button class="btn-primary" type="submit">

                    Criar administrador

                    <i class="fa-solid fa-arrow-right"></i>

                </button>

                <a
                    class="btn-secondary"
                    href="login_adm.php">

                    Voltar para login ADM

                </a>

            </form>

        </section>

    </main>

    <script>
        document.querySelectorAll('.show-password').forEach((button) => {

            button.addEventListener('click', () => {

                const input = document.getElementById(button.dataset.target);

                const icon = button.querySelector('i');

                const isPassword = input.type === 'password';

                input.type = isPassword ? 'text' : 'password';

                icon.classList.toggle('fa-eye', isPassword);

                icon.classList.toggle('fa-eye-slash', !isPassword);

            });

        });
    </script>

    <?php require_once __DIR__ . "/../includes/toast.php"; ?>

</body>

</html>