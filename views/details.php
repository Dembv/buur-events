<?php 
    // Titre de la page
    $titre = 'Détails';
    // Démarrage de la temporisation de sortie
    ob_start();
?>
    <?php if($evenement && $categorie) { ?>
    <!-- Fil d'Ariane -->
    <div class="row px-md-5 px-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-decoration-none text-sombre" href="evenements">Evenements</a></li>
                <li class="breadcrumb-item text-sombre" aria-current="page">Titre</li> <!-- Titre de la page -->
            </ol>
        </nav>
    </div>
    <!-- Titre de l'évènement -->
    <div class="row px-md-5 px-2">
        <h4 class="text-sombre"><?php echo $evenement->getTitre(); ?></h4>
    </div>
    <!-- Contenu principal -->
    <div class="row px-md-5 px-2 mb-3">
        <!-- Colonne de gauche avec l'image -->
        <div class="col-md-8 mb-md-0 mb-3 px-md-2 px-0">
            <img src="<?php echo ASSETS; ?>images/uploads/<?php echo $evenement->getImage(); ?>" class="img-fluid rounded" alt="">
        </div>
        <!-- Colonne de droite avec les détails de l'évènement -->
        <div class="col-md-4 border rounded px-md-5 px-3 py-5">
            <div class="my-md-5">
                <h4 class="">Détails de l'évènement</h4>
                <p>Organisé par : <?php echo $utilisateur->getPrenom()." ".$utilisateur->getNom(); ?></p>
                <p>Date/Heure : <?php echo $evenement->getDate()."/".$evenement->getHeure(); ?> </p>
                <p>Lieu : <?php echo $evenement->getLieu(); ?></p>
                <p>Catégorie : <?php echo $categorie->getLibelleCategorie(); ?></p>
                <p>Capacité : <?php echo $evenement->getCapacite(); ?></p>
                <!-- Bouton de réservation -->
                <a href="reservation-<?php echo $evenement->getId(); ?>" class="btn bg-clair text-sombre w-100">Réserver</a>
            </div>
        </div>
    </div>
    <!-- Description de l'évènement -->
    <div class="row px-md-5 px-2">
        <h4>Description de l'évènement</h4>
        <p><?php echo $evenement->getDescription(); ?></p>
    </div>

    <?php } ?>

<?php
    // Récupération du contenu de la temporisation de sortie et nettoyage de la mémoire tampon
    $contenu = ob_get_clean();
    // Inclusion de la structure de base de la page
    include 'base.php'
?>
