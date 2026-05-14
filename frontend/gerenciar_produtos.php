<?php

require_once __DIR__ . "/../includes/header.php";
require_once __DIR__ . "/../includes/init.php";

$stmt = $pdo->prepare("
            SELECT
                id,
                produto,
                preco
            FROM produtos
");
$stmt->execute();
$produtos = $stmt->fetchAll();;

?>

<body>

    <?php require_once __DIR__ . "/../includes/topbar.php"; ?>

    <main class="lista-produtos-main">

        <section class="topo-lista">
            <div>
                <span class="tag-produtos">Painel</span>
                <h1>Produtos cadastrados</h1>
                <p>Visualize todos os produtos cadastrados no sistema.</p>
            </div>

            <a href="adicionar_produto.php" class="btn-novo-produto">
                <i class="fa-solid fa-plus"></i>
                Novo produto
            </a>
        </section>

        <section class="lista-produtos">

            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>

                    <!-- PRODUTO -->
                    <article class="linha-produto">

                        <div class="produto-esquerda">

                            <div class="produto-imagem">
                                <i class="fa-solid fa-box"></i>
                            </div>

                            <div class="produto-info">
                                <h2><?= ucfirst($produto["produto"]); ?></h2>
                                <span>#<?= $produto["id"]; ?></span>
                            </div>

                        </div>

                        <div class="produto-direita">

                            <div class="produto-preco">
                                <span>Preço</span>
                                <strong><?= formatarMoeda($produto["preco"]); ?></strong>
                            </div>

                            <div class="acoes-produto">
                                <button class="btn-editar">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <button class="btn-excluir">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>
            <?php endif; ?>

        </section>

    </main>

    <?php require_once __DIR__ . "/../includes/footer.php"; ?>
</body>

<!-- EDITAR PRODUTO COM MODAL E JS MOSTRANDO PRODUTO ATUAL E UPDATE NO BACKEND -->

</html>