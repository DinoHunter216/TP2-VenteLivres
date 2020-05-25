<?php session_start(); createCart(); ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow p-3 mb-5">
        <!-- Book Icon venant du site de Bootstrap -->
        <svg class="bi bi-book text-danger mb-2" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 018.5 2.5v11a.5.5 0 01-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 010 13.5v-11a.5.5 0 01.276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 01.22-.103 12.958 12.958 0 012.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 001 2.82z"
                clip-rule="evenodd" />
            <path fill-rule="evenodd"
                d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 007.5 2.5v11a.5.5 0 00.854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0016 13.5v-11a.5.5 0 00-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 00-.799-.34 12.96 12.96 0 00-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0115 2.82z"
                clip-rule="evenodd" />
        </svg>
        <h2 class="text-danger mx-2">Livres</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link mx-2 text-white" href="/accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white ml-2" href="/panier">Panier
                        <span class="badge badge-danger"><?php getNumberOfItems() ?></span>
                    </a>
                </li>
            </ul>
            <!-- Pour coller le reste à droite -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">
            </ul>
            </ul>
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav mr-auto">

                <?php
                    if (isset($_SESSION['utilisateur'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link text-white mx-2" href="/deconnexion">Se déconnecter</a>
                </li>
                <h4 class="text-danger my-1 mx-2">|</h4>
                <li class="nav-item">
                    <a class="nav-link text-white mx-2" href="/modification">Modifier son profil</a>
                </li>
                <h4 class="text-danger my-1 mx-2">|</h4>
                <p class="text-white my-2 mx-2"><?php echo $_SESSION['utilisateur']." connecté" ?>
                </p>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link text-white mx-2" href="/connexion">Se connecter</a>
                </li>
                <h4 class="text-danger my-1 mx-2">|</h4>
                <li class="nav-item">
                    <a class="nav-link text-white mx-2" href="/inscription">S'inscrire</a>
                </li>
                <?php endif; ?>
            </ul>
            <form class="form-inline my-2 ml-2 my-lg-0" action="/action/validateSearch.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Livre" name="search" required="required">
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </nav>
    </br>
</header>