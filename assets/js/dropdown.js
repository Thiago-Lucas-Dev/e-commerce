const btnUsuario = document.getElementById("btnUsuario");
const dropdownUsuario = document.getElementById("dropdownUsuario");

btnUsuario.addEventListener("click", () => {
    dropdownUsuario.classList.toggle("ativo");
});

/* FECHAR AO CLICAR FORA */
document.addEventListener("click", (event) => {

    const clicouDentro =
        btnUsuario.contains(event.target) ||
        dropdownUsuario.contains(event.target);

    if (!clicouDentro) {
        dropdownUsuario.classList.remove("ativo");
    }

});

const btnProduto = document.getElementById('btnProduto');
const dropdownProduto = document.getElementById('dropdownProduto');

if (btnProduto && dropdownProduto) {

    btnProduto.addEventListener('click', () => {

        dropdownProduto.classList.toggle('ativo');

    });

    document.addEventListener('click', (event) => {

        if (
            !btnProduto.contains(event.target) &&
            !dropdownProduto.contains(event.target)
        ) {
            dropdownProduto.classList.remove('ativo');
        }

    });

}