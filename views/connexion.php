<?php 
    // Titre de la page
    $titre = 'Se connecter';
    // Démarrage de la temporisation de sortie
    ob_start();
?>

    <div class="row page py-2 align-items-center justify-content-center">
        <div class="col-md-4 col-11">
            <div class="row bg-light rounded shadow py-3">
                <!-- Titre de la section de connexion -->
                <h4 class="text-center text-sombre">Connexion à BUUR Events</h4>
                <div class="my-md-2">
                    <!-- Formulaire de connexion -->
                    <form class="vstack g-2" action="connexion" method="post" id="formConnexion">
                        <!-- Champ email -->
                        <div class="form-group m-2">
                            <label for="email" class="text-sombre">Email</label>
                            <input type="email" class="form-control" name="email" id="email" autocomplete="on">
                            <span id="spanEmail"></span> <!-- Message d'erreur pour l'email -->
                        </div>
                        <!-- Champ mot de passe -->
                        <div class="form-group m-2">
                            <label for="password" class="text-sombre">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span id="spanPassword"></span> <!-- Message d'erreur pour le mot de passe -->
                        </div>
                        <!-- Bouton de connexion -->
                        <div class="form-group m-2">
                            <button class="btn bg-clair text-sombre w-100">Se connecter</button>
                            <span id="spanButton"></span> <!-- Message d'erreur pour le bouton -->
                        </div>
                    </form>
                </div>
                <!-- Lien pour s'inscrire -->
                <div class="px-4">
                    <p class="text-end text-sombre">Nouveau sur BUUR Events? <a class="text-decoration-none text-clair" href="inscription">S'inscrire</a></p>
                </div>
            </div>
        </div>
    </div>

<?php
    // Récupération du contenu de la temporisation de sortie et nettoyage de la mémoire tampon
    $contenu = ob_get_clean();
    // Inclusion de la structure de base de la page
    include 'base.php'
?>
