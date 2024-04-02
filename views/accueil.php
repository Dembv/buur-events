<?php 
    // Définition du titre de la page
    $titre = 'BUUR Events';
    
    // Mise en mémoire tampon du contenu HTML
    ob_start();
?>
    <!-- Contenu de la page -->
    <div class="page">
        <!-- Bannière -->
        <div class="row" id="banner">
            <div class="cover-container d-flex w-100 h-100 p-3 mx-auto justify-content-center flex-column" id="mon-cover">
                <!-- Titre de la bannière -->
                <h1 class="text-white text-uppercase">Buur Events</h1>
                <!-- Description de la bannière -->
                <p class="lead text-white">Créez des instants magiques qui durent pour toujours. De l'imagination à la réalité, notre équipe transforme vos rêves en événements extraordinaires. Plongez dans un univers où chaque détail compte. Bienvenue dans l'art de l'événementiel.</p>
                <!-- Bouton pour créer un événement -->
                <p class="lead">
                    <a href="ajouter" class="btn btn-lg text-sombre bg-clair fw-bold border-white">Créer un évènement</a>
                </p>
            </div>
        </div>
        <!-- Conteneur pour les événements -->
        <div class="row">
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row g-3">
                        <!-- Titre pour la section "A la Une" -->
                        <h2 class="text-sombre">A la Une</h2>
                    </div>
                    <!-- Grille pour afficher les événements -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php 
                            // Vérification de la présence d'événements
                            if($evenements) {
                                foreach($evenements as $evenement) { 
                        ?>
                        <!-- Carte pour un événement -->
                        <div class="evenement" data-titre="<?php echo $evenement->getTitre(); ?>" data-description="<?php echo $evenement->getDescription(); ?>" data-lieu="<?php echo $evenement->getLieu(); ?>">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <!-- Image de l'événement -->
                                    <img style="height: 200px;" src="<?php echo ASSETS; ?>images/uploads/<?php echo $evenement->getImage(); ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <!-- Titre et lieu de l'événement -->
                                        <p class="card-text"><?php echo $evenement->getTitre(); ?> - <?php echo $evenement->getLieu(); ?></p>
                                        <!-- Description de l'événement (tronquée) -->
                                        <p class="card-text text-truncate"><?php echo $evenement->getDescription(); ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <!-- Bouton pour voir les détails de l'événement -->
                                            <div class="btn-group">
                                                <a href="details-<?php echo $evenement->getId(); ?>" class="btn btn-sm bg-sombre text-white">Voir Détails</a>
                                            </div>
                                            <!-- Date et heure de l'événement -->
                                            <small class="text-sombre"><?php echo $evenement->getDate()." ".$evenement->getHeure(); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    // Récupération du contenu et inclusion de la base de la page
    $contenu = ob_get_clean();
    include 'base.php';
?>
