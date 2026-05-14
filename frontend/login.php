<?php

session_start();

$erros = $_SESSION['erros'] ?? [];

unset($_SESSION['erros']);

$sucesso = $_SESSION["sucesso"] ?? null;

unset($_SESSION["sucesso"]);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Login | PIMSTORE</title>
</head>

<body>
    <main class="auth-page">
        <section class="auth-card login-card">
            <div class="user-icon">
                <i class="fa-regular fa-user"></i>
            </div>

            <div class="auth-title">
                <h1>Bem-vindo à <span>PIM</span>STORE</h1>
                <p>Faça login para acessar sua conta e continuar sua jornada gamer.</p>
            </div>

            <form action="../backend/login_service.php" method="post">
                <label for="email">E-mail</label>
                <div class="input-box">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" autocomplete="email" required maxlength="60">
                </div>

                <label for="senha">Senha</label>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="senha" name="senha" placeholder="••••••••••" autocomplete="current-password" required minlength="6" maxlength="20">
                    <button class="show-password" type="button" aria-label="Mostrar senha" data-target="senha">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>

                <div class="form-options">
                    <label class="check-option">
                        <input type="checkbox" checked>
                        <span>Lembrar de mim</span>
                    </label>
                    <a href="#">Esqueci minha senha</a>
                </div>

                <?php if ($sucesso): ?>

                    <div class="box-sucesso">
                        <p><?= $sucesso; ?></p>
                    </div>

                <?php endif; ?>

                <button class="btn-primary" type="submit">
                    Entrar
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

                <a class="btn-secondary" href="cadastro.php">Criar conta</a>

                <div class="divider">
                    <span>Ou continue com</span>
                </div>

                <div class="social-login">
                    <a href="#" class="social-btn google">
                        <i class="fa-brands fa-google"></i>
                        Google
                    </a>
                    <a href="#" class="social-btn twitch">
                        <i class="fa-brands fa-twitch"></i>
                        Twitch
                    </a>
                </div>
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
</body>

</html>