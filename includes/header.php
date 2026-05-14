<header>
        <a class="nome" href="index.php"><span>PIM</span>STORE</a>

        <div class="pesquisar">
            <input type="search" id="barra" placeholder="Busca de produtos">
            <button id="btn-busca" aria-label="Buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <div class="icones">
            <?php if (!isset($_SESSION["usuario"])): ?>

                <a href="../frontend/login.php" aria-label="Login"><i class="fa-solid fa-user"></i></a>

            <?php else: ?>

                <div class="usuario-dropdown">

                    <button class="usuario-btn" id="btnUsuario">
                        <i class="fa-solid fa-user"></i>
                    </button>

                    <div class="dropdown-menu" id="dropdownUsuario">

                        <div class="dropdown-topo">
                            <p class="usuario-nome">
                                <?= $_SESSION["usuario"]["nome"] ?>
                            </p>

                            <span class="usuario-email">
                                <?= $_SESSION["usuario"]["email"] ?>
                            </span>
                        </div>

                        <div class="linha-dropdown"></div>

                        <a href="perfil.php">
                            <i class="fa-solid fa-user"></i>
                            Meu perfil
                        </a>

                        <a href="pedidos.php">
                            <i class="fa-solid fa-box"></i>
                            Meus pedidos
                        </a>

                        <a href="favoritos.php">
                            <i class="fa-solid fa-heart"></i>
                            Favoritos
                        </a>

                        <div class="linha-dropdown"></div>

                        <a href="../backend/logout.php" class="logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Sair
                        </a>

                    </div>

                </div>

            <?php endif; ?>
            <a href="#" id="btn-carrinho" aria-label="Carrinho"><i class="fa-solid fa-cart-shopping"></i></a>

            <a href="favoritos.php" class="icone-favoritos" aria-label="Favoritos">
                <i class="fa-solid fa-heart"></i>
                <span class="badge-favoritos">0</span>
            </a>

        </div>
    </header>