<?php

// TOAST DE ERROS
$erros = $_SESSION['erros'] ?? [];

unset($_SESSION['erros']);

// TOAST DE SUCESSO
$sucesso = $_SESSION["sucesso"] ?? null;

unset($_SESSION["sucesso"])

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/add_produto.css">
    <link rel="stylesheet" href="../assets/css/toast.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <title>Cadastro de Produtos | PIMSTORE</title>
</head>

<body>

    <main class="page">

        <section class="card">

            <div class="topo">

                <div class="icone">
                    <i class="fa-solid fa-box"></i>
                </div>

                <h1>Cadastro de <span>Produtos</span></h1>

                <p>Adicione novos produtos para exibir no catálogo da PIMSTORE.</p>

            </div>

            <form id="formProduto" action="../backend/cadastro_produto.php" method="post" enctype="multipart/form-data">

                <div class="grid">

                    <div class="campo full">
                        <label>Nome do produto</label>

                        <div class="input-box">
                            <i class="fa-solid fa-keyboard"></i>
                            <input type="text" id="nome" placeholder="Digite o nome do produto" autocomplete="off" name="produto-nome">
                        </div>
                    </div>

                    <div class="campo full">
                        <label>Preço</label>

                        <div class="input-box">
                            R$
                            <input type="number" id="preco" placeholder="0.00" name="produto-preco">
                        </div>
                    </div>

                      <div class="campo full">
                        <label>Descrição do produto</label>

                        <div class="input-box">
                            <i class="fa-solid fa-chat"></i>
                            <textarea name="descricao" id="" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="campo full">
                        <label>Imagem do produto</label>

                        <div class="input-box">
                            <i class="fa-solid fa-image"></i>
                            <input
                                type="file"
                                id="imagem"
                                name="imagem"
                                accept="image/*">
                        </div>

                        <div class="preview" id="preview">
                            <span>Pré-visualização da imagem</span>
                        </div>
                    </div>

                </div>

                <div class="acoes">

                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-plus"></i>
                        Cadastrar produto
                    </button>
                </div>

            </form>

        </section>

    </main>

    <script>
        const imagemInput = document.getElementById('imagem');
        const preview = document.getElementById('preview');
        const form = document.getElementById('formProduto');
        const toast = document.getElementById('toast');

        imagemInput.addEventListener('change', (event) => {

            const arquivo = event.target.files[0];

            if (!arquivo) return;

            const reader = new FileReader();

            reader.onload = (e) => {

                preview.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                `;
            }

            reader.readAsDataURL(arquivo);

        });
    </script>

</body>

<?php require_once __DIR__ . "/../includes/footer.php"; ?>

</html>