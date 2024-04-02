<?php 
    // Titre de la page
    $titre = 'S\'inscrire';
    // Démarrage de la temporisation de sortie
    ob_start();
?>

    <!-- Formulaire d'inscription -->
    <div class="row page py-2 align-items-center justify-content-center">
        <div class="col-md-4 col-11">
            <div class="row bg-light rounded shadow py-3">
                <h4 class="text-center">Inscription à BUUR Events</h4>
                <div class="my-md-2">
                    <form class="vstack g-2" action="inscription" method="post" id="formInscription">
                        <!-- Champ Prénoms et Nom -->
                        <div class="d-md-flex d-block m-2">
                            <div class="form-group w-md-60 me-md-3">
                                <label for="prenom" class="text-sombre">Prénoms</label>
                                <input type="text" class="form-control" name="prenom" id="prenom">
                                <span id="spanPrenom"></span>
                            </div>
                            <div class="form-group w-md-40 ms-md-3">
                                <label for="nom" class="text-sombre">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom">
                                <span id="spanNom"></span>
                            </div>
                        </div>
                        <!-- Champ Email -->
                        <div class="form-group m-2">
                            <label for="email" class="text-sombre">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <span id="spanEmail"></span>
                        </div>
                        <!-- Champ Numéro de téléphone -->
                        <div class="form-group m-2">
                            <label for="telephone" class="text-sombre">Numéro de téléphone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone">
                            <span id="spanTelephone"></span>
                        </div>
                        <!-- Champ Adresse -->
                        <div class="form-group m-2">
                            <label for="adresse" class="text-sombre">Adresse</label>
                            <input type="text" class="form-control" name="adresse" id="adresse">
                            <span id="spanAdresse"></span>
                        </div>
                        <!-- Champ Mot de passe -->
                        <div class="form-group m-2">
                            <label for="password" class="text-sombre">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span id="spanPassword"></span>
                        </div>
                        <!-- Bouton S'inscrire -->
                        <div class="form-group m-2">
                            <button class="btn bg-clair text-sombre w-100">S'inscrire</button>
                            <span id="spanButton"></span>
                        </div>
                    </form>
                </div>
                <!-- Lien vers la page de connexion -->
                <div class="px-4">
                    <p class="text-end text-sombre">Tu as deja un compte sur BUUR Events? <a class="text-decoration-none text-clair" href="connexion">Se connecter</a></p>
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
