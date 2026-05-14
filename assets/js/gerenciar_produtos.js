const botoesEditar = document.querySelectorAll(".btn-editar");

botoesEditar.forEach((botao) => {

    botao.addEventListener("click", () => {

        const linhaProduto = botao.closest(".linha-produto");

        document.querySelectorAll(".linha-produto").forEach((linha) => {

            if (linha !== linhaProduto) {
                linha.classList.remove("editando");
            }

        });

        linhaProduto.classList.toggle("editando");

    });

});

const botoesCancelar = document.querySelectorAll(".btn-cancelar");

botoesCancelar.forEach((botao) => {

    botao.addEventListener("click", () => {

        const linhaProduto = botao.closest(".linha-produto");

        linhaProduto.classList.remove("editando");

    });

});