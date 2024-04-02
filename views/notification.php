<?php 
    // Définition du titre de la page
    $titre = 'Notification évènement';
    // Démarrage de la temporisation de sortie
    ob_start();
?>

<div class="row page py-2 align-items-center justify-content-center">
    <div class="col-md-4 col-11">
        <div class="row bg-white rounded shadow py-3">
            <h4 class="text-sombre">Envoyer une notification</h4>
            <div class="my-md-2">
                <!-- Formulaire de modification de l'évènement -->
                <form id="" method="post" action="notification-<?php echo $evenement->getId(); ?>" class="vstack g-2">
                    <!-- Champ de saisie du titre -->
                    <div class="form-group m-2">
                        <label for="objet">Objet</label>
                        <input class="form-control" name="objet" id="objet" value="" required></input>
                    </div>
                    <!-- Champ de saisie de la description -->
                    <div class="form-group m-2">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" id="message" style="height: auto; min-height: 200px; resize: vertical;" required></textarea>
                    </div>
                    <!-- Bouton de soumission du formulaire -->
                    <div class="form-group m-2">
                        <button class="btn bg-clair w-100">Envoyer</button>
                    </div>
                </form>
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