<div class="row bg-light align-items-center sticky-top" style="min-height: 10vh;">
    <!-- En-tête de la page -->
    <header class="">
        <!-- Barre de navigation -->
        <nav class="navbar navbar-expand-md bg-light" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <!-- Logo et lien vers la page d'accueil -->
                <a class="navbar-brand text-sombre fs-4 fw-bold text-uppercase" href="accueil">BUUR Events</a>
                <!-- Bouton pour activer le menu de navigation sur les petits écrans -->
                <button class="navbar-toggler border-0 order-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fs-6"></span>
                </button>
                <!-- Bouton pour se connecter ou se déconnecter, en fonction de l'état de connexion -->
                <?php if ($estConnecter): ?>
                    <a class="btn bg-clair text-sombre rounded-4 ms-md-5 mt-md-0 text-clair order-1 order-md-3" href="deconnexion">Déconnexion</a>
                <?php else: ?>
                    <a class="btn bg-clair text-sombre rounded-4 ms-md-5 mt-md-0 text-clair order-1 order-md-3" href="connexion">Connexion</a>
                <?php endif ?>
                <!-- Menu de navigation -->
                <div class="collapse navbar-collapse order-2 order-md-2" id="navbarsExample04">
                    <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                        <!-- Liens vers différentes sections du site -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="accueil"><span class="text-sombre">Accueil</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="evenements"><span class="text-sombre">Liste d'évènements</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="mesreservations"><span class="text-sombre">Mes réservations</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="mesevenements"><span class="text-sombre">Mes évènements</span></a>
                        </li>
                        <!-- Bouton pour créer un nouvel évènement -->
                        <li class="nav-item ms-md-5">
                            <a href="ajouter" class="btn rounded-4 bg-clair text-sombre">Création d'évènement</a>
                        </li>
                    </ul>
                    <!-- Formulaire de recherche d'évènements -->
                    <form id="rechercheForm">
                        <input id="rechercheInput" name="search" class="form-control text-sombre border-sombre border-2" placeholder="Recherche d'évènement">
                    </form>   
                </div>
            </div>
        </nav>
    </header>
</div>
