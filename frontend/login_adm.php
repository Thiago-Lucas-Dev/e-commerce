<?php

session_start();

// TOAST DE ERROS
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <link rel="stylesheet" href="../assets/css/toast.css">
    <title>Administrador | PIMSTORE</title>
</head>

<body>

    <header>
        <a class="nome" href="index.php">
            <span>PIM</span>STORE
        </a>
    </header>

    <main class="auth-page">

        <section class="auth-card login-card">

            <div class="user-icon">
                <i class="fa-solid fa-user-shield"></i>
            </div>

            <div class="auth-title">
                <h1>Painel <span>Administrativo</span></h1>

                <p>
                    Entre com sua conta de administrador para acessar
                    o gerenciamento da plataforma.
                </p>
            </div>

            <form action="../backend/login_adm_service.php" method="post">

                <label for="email">Usuário administrativo</label>

                <div class="input-box">
                    <i class="fa-solid fa-user-tie"></i>

                    <input
                        type="input"
                        id="email"
                        name="nome-adm"
                        placeholder="admin"
                        required
                        maxlength="60">
                </div>

                <label for="senha">Senha administrativa</label>

                <div class="input-box">
                    <i class="fa-solid fa-shield-halved"></i>

                    <input
                        type="password"
                        id="senha"
                        name="senha-adm"
                        placeholder="••••••••••"
                        autocomplete="current-password"
                        required
                        minlength="6"
                        maxlength="20">

                    <button
                        class="show-password"
                        type="button"
                        aria-label="Mostrar senha"
                        data-target="senha">
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

                <button class="btn-primary mb-3" type="submit">

                    Acessar painel

                    <i class="fa-solid fa-arrow-right"></i>

                </button>

                <a class="social-btn mb-3" href="cadastro_adm.php">

                    Cadastrar administrador

                    <i class="bi bi-person-fill"></i>

                </a>

                <a class="social-btn" href="login.php">

                    <i class="fa-solid fa-arrow-left"></i>

                    Voltar para login do usuário

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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

    <?php require_once __DIR__ . "/../includes/footer.php"; ?>

</body>

</html>