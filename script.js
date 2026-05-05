//Busca de produtos
const barra = document.querySelector("#barra");
const produtos = document.querySelectorAll(".produto");
const btnBusca = document.querySelector("#btn-busca");
const mensagem = document.querySelector("#nenhum-resultado")


function buscar() {
    const valor = barra.value.toLowerCase();
    let encontrou = false;

    produtos.forEach(produto => {
        const nome = produto.querySelector(".nome-produto").innerText.toLowerCase();

        if (nome.includes(valor)) {
            produto.style.display = "";
            encontrou = true;
        } else {
            produto.style.display = "none";
        }
    });

    if (mensagem) {
    if(encontrou){
        mensagem.style.display = "none";
    } else {
        mensagem.style.display = "block";
    }
}
}

//Busca de produto ao clicar no ícone
btnBusca.addEventListener("click", function(e){
    e.preventDefault();
    buscar();
});

//Busca de produto ao apertar Enter
barra.addEventListener("keypress", function(e){
    if (e.key === "Enter") {
        buscar();
    }
});

//Abrir e fechar carrinho ao clicar no ícone de carrinho
const btnCarrinho = document.querySelector("#btn-carrinho");
const carrinho = document.querySelector(".carrinho");

btnCarrinho.addEventListener("click", function(e){
    e.preventDefault();
    carrinho.classList.add("ativo");
    verificarCarrinho();   
});

const btnFechar = document.querySelector(".fechar");

btnFechar.addEventListener("click", function(){
    carrinho.classList.remove("ativo");
});

//Verificação se o carrinho está vazio
const itens = document.querySelector(".itens");
const carrinhoVazio = document.querySelector(".carrinho-vazio");

function verificarCarrinho(){
    if (itens.children.length === 0){
        carrinhoVazio.style.display = "block";
    } else {
        carrinhoVazio.style.display = "none";
    }
}

//Acionando produtos no carrinho ao clicar em "Adicionar ao carrinho"
const botoesAdicionar = document.querySelectorAll(".Adicionar")

botoesAdicionar.forEach(botao =>{
    botao.addEventListener("click", function(){
        const produto = botao.closest(".produto");
        const nome = produto.querySelector(".nome-produto").innerText;
        const preco = produto.querySelector(".preco").innerText;
        const imagem = produto.querySelector("img").src;

        adicionarAoCarrinho(nome, preco, imagem);
        
    })
})

function adicionarAoCarrinho(nome, preco, imagem) {

    const itens = document.querySelectorAll(".item-carrinho");

    // verificar se já existe o produto no carrinho para nao duplicar 
    for (let item of itens) {
        const nomeExistente = item.querySelector(".nome-item").innerText;

        if (nomeExistente === nome) {
            const spanQtd = item.querySelector(".quantidade span");
            spanQtd.innerText++;

            atualizarTotal();
            carrinho.classList.add("ativo");
            return; 
        }
    }

    // se não existir, cria novo
    const item = document.createElement("div");
    item.classList.add("item-carrinho");

    item.innerHTML = `
        <img src="${imagem}" alt="${nome}">

        <div class="info-item">
            <div class="topo-item">
                <p class="nome-item">${nome}</p>
                <i class="fa-solid fa-xmark remover"></i>
            </div>

            <p class="preco-item">${preco}</p>

            <div class="quantidade">
                <button>-</button>
                <span>1</span>
                <button>+</button>
            </div>
        </div>
    `;

    document.querySelector(".itens").appendChild(item);

    // Botão para remover o produto do carrinho
    const btnRemover = item.querySelector(".remover");

    btnRemover.addEventListener("click", function(){
        item.remove();
        verificarCarrinho();
        atualizarTotal();
    });

//Botões de quantidade 
    const btnMais = item.querySelector(".quantidade button:last-child");
    const btnMenos = item.querySelector(".quantidade button:first-child");
    const spanQtd = item.querySelector(".quantidade span");

    //Aumenta a quantidade do produto
    btnMais.addEventListener("click", () => {
        spanQtd.innerText++;
        atualizarTotal();
    });
    //Diminui a quantidae do produto
    btnMenos.addEventListener("click", () => {
        if (spanQtd.innerText > 1) {
            spanQtd.innerText--;
            atualizarTotal();
        }
    });

    verificarCarrinho();
    atualizarTotal();
    carrinho.classList.add("ativo");
}   

//Função para calcular total
function atualizarTotal() {

    const itens = document.querySelectorAll(".item-carrinho");
    let total = 0;

    itens.forEach(item => {
        const precoTexto = item.querySelector(".preco-item").innerText;
        const quantidade = item.querySelector(".quantidade span").innerText;

        const preco = parseFloat(precoTexto.replace("R$", "").replace(",", "."));

        total += preco * quantidade;
    });

    document.querySelector(".valor-total").innerText =
        "R$ " + total.toFixed(2).replace(".", ",");
}



// FAVORITOS
const botoesFavorito = document.querySelectorAll(".favorito");


let favoritos = JSON.parse(localStorage.getItem("favoritos")) || [];

botoesFavorito.forEach(botao => {
    const produto = botao.closest(".produto");
    const nome = produto.querySelector(".nome-produto").innerText;

    const existe = favoritos.some(item => item.nome === nome);

    if (existe) {
        botao.classList.add("ativo");
    }
});

//Clique no coração
botoesFavorito.forEach(botao => {
    botao.addEventListener("click", function(){

        const produto = botao.closest(".produto");

        const nome = produto.querySelector(".nome-produto").innerText;
        const preco = produto.querySelector(".preco").innerText;
        const imagem = produto.querySelector("img").src;

        salvarFavorito({ nome, preco, imagem }, botao);
    });
});

//Função adicionar/remover
function salvarFavorito(produto, botao) {

    let favoritos = JSON.parse(localStorage.getItem("favoritos")) || [];

    const index = favoritos.findIndex(item => item.nome === produto.nome);

    if (index === -1) {
        // adiciona
        favoritos.push(produto);
        botao.classList.add("ativo");
    } else {
        // remove
        favoritos.splice(index, 1);
        botao.classList.remove("ativo");
    }

    localStorage.setItem("favoritos", JSON.stringify(favoritos));
}