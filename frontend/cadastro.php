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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>Cadastro | PIMSTORE</title>
</head>

<body>

    <header>
        <a class="nome" href="index.html"><span>PIM</span>STORE</a>
    </header>

    <main class="auth-page">
        <section class="auth-card register-card">
            <div class="user-icon">
                <i class="fa-regular fa-user"></i>
            </div>

            <div class="auth-title">
                <h1>Crie sua conta na <span>PIM</span>STORE</h1>
                <p>Cadastre-se para acessar sua conta e começar sua jornada gamer.</p>
            </div>

            <form class="cadastro" action="../backend/salvar_usuario.php" method="post">

                <label for="nome">Nome completo</label>
                <div class="input-box">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" id="nome" name="nome" placeholder="Seu nome completo" autocomplete="name" maxlength="80">
                </div>

                <label for="email">E-mail</label>
                <div class="input-box">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" autocomplete="email" maxlength="60">
                </div>

                <label for="senha">Senha</label>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="senha" name="senha" placeholder="••••••••••" autocomplete="new-password" minlength="6" maxlength="20">
                    <button class="show-password" type="button" aria-label="Mostrar senha" data-target="senha">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>

                <label for="confirmarSenha">Confirmar senha</label>
                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="confirmarSenha" name="confirmarSenha" placeholder="••••••••••" autocomplete="new-password" minlength="6" maxlength="20">
                    <button class="show-password" type="button" aria-label="Mostrar senha" data-target="confirmarSenha">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>

                <div class="form-options register-options">
                    <label class="check-option">
                        <input type="checkbox" id="termos" required checked>
                        <span>Aceito os termos e condições</span>
                    </label>
                    <a href="login.php">Já tenho conta</a>
                </div>

                <?php if (!empty($erros)): ?>

                    <div class="box-erros">

                        <p class="erro"><?= $erros[0]; ?></p>

                    </div>

                <?php endif; ?>

                <button class="btn-primary" type="submit">
                    Criar conta
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

                <a class="btn-secondary" href="login.php">Voltar para login</a>

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