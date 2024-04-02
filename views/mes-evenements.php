<?php 
    // Définition du titre de la page
    $titre = 'Mes évènements';
    // Démarrage de la temporisation de sortie
    ob_start();
?>

    <!-- Contenu de la page -->
    <div class="row page">
        <!-- Section des évènements de l'utilisateur -->
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row g-3">
                    <!-- Titre de la section -->
                    <h2 class="text-sombre">Mes Evenements</h2>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php 
                        // Vérification de l'existence d'évènements
                        if($evenements) {
                            // Parcours des évènements de l'utilisateur
                            foreach($evenements as $evenement) { 
                    ?>
                    <!-- Carte d'un évènement -->
                    <div class="evenement" data-titre="<?php echo $evenement->getTitre(); ?>" data-description="<?php echo $evenement->getDescription(); ?>" data-lieu="<?php echo $evenement->getLieu(); ?>">
                        <div class="col">
                            <div class="card shadow-sm">
                                <!-- Image de l'évènement -->
                                <img style="height: 200px;" src="<?php echo ASSETS; ?>images/uploads/<?php echo $evenement->getImage(); ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <!-- Titre et description de l'évènement -->
                                    <p class="card-text"><?php echo $evenement->getTitre(); ?></p>
                                    <p class="card-text text-truncate"><?php echo $evenement->getDescription(); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <!-- Liens vers les actions de l'évènement (détails, modifier, supprimer) -->
                                            <a href="details-<?php echo $evenement->getId(); ?>" class="btn btn-sm btn-outline-primary">Détails</a>
                                            <a href="notification-<?php echo $evenement->getId(); ?>" class="btn btn-sm btn-outline-dark">Notifier</a>
                                            <a href="modifier-<?php echo $evenement->getId(); ?>" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                            <a href="supprimer-<?php echo $evenement->getId(); ?>" class="btn btn-sm btn-outline-danger">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                            } 
                        } 
                    ?>
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
