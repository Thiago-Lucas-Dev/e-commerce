<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Favoritos | PIMSTORE</title>
</head>

<body class="pagina-favoritos">

    <?php require_once __DIR__ . "/../includes/header.php"; ?>

    <main class="favoritos-main">
        <section class="topo-favoritos">
            <div class="titulo-area">
                <h1>Seus favoritos</h1>
                <p>Aqui estão os produtos que você salvou.</p>
            </div>
        </section>

        <section class="linha-info">
            <p class="quantidade">6 produtos</p>
            <select class="ordenacao" id="ordenacao">
                <option value="recentes">Mais recentes</option>
                <option value="menor-preco">Menor preço</option>
                <option value="maior-preco">Maior preço</option>
                <option value="nome">Nome</option>
            </select>
        </section>

        <section class="produtos favoritos-grid" id="listaFavoritos"></section>

        <div class="acoes-baixo">
            <button class="limpar" id="limparFavoritos">
                <i class="fa-regular fa-trash-can"></i>
                Limpar todos os favoritos
            </button>
        </div>
    </main>
    
    <script src="/assets/js/script.js"></script>
</body>

</html>