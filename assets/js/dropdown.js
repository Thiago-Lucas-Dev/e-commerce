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