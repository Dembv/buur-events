<?php 
    // Titre de la page
    $titre = 'Evènements';
    // Démarrage de la temporisation de sortie
    ob_start();
?>
    <!-- Conteneur de la page -->
    <div class="page">
        <!-- Bannière avec formulaire de filtrage -->
        <div class="row bg-clair">
            <div class="cover-container d-flex w-100 h-100 p-3 mx-auto justify-content-center flex-column" id="mon-cover">
                <!-- Titre et formulaire de filtrage -->
                <h1 class="text-white text-uppercase">Découvrez les évènements que vous aimez</h1>
                <form action="" class="lead">
                    <div class="row" id="filtres">
                        <!-- Sélecteur de période -->
                        <div class="col-md-5 col-6">
                            <select name="periode" id="periode" class="form-select">
                                <option value="0" active>Tous</option>
                                <option value="1" active>A venir</option>
                                <option value="2">Passés</option>
                            </select>
                        </div>
                        <!-- Sélecteur de catégorie -->
                        <div class="col-md-5 col-6">
                            <select name="categorie" id="categorie" class="form-select">
                                <option value="0" active>Tous</option>
                                <!-- Boucle pour afficher les options de catégorie -->
                                <?php
                                    if($categories) {
                                    foreach($categories as $categorie) { 
                                ?>
                                <option value="<?php echo $categorie->getId()?>">
                                    <?php echo $categorie->getLibelleCategorie()?>
                                </option>
                                <?php
                                        }
                                    } 
                                ?>
                            </select>
                        </div>
                        <!-- Bouton pour filtrer les évènements -->
                        <!--<div class="col-md-2 mt-md-0 mt-2 d-flex justify-content-center">
                            <a href="evenements" class="btn btn w-100 text-white bg-sombre border-white" id="lienFiltrer">Filtrer</a>
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
        <!-- Section des évènements -->
        <div class="row">
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row g-3">
                        <h2 class="text-sombre">Tous les évènements</h2>
                    </div>
                    <!-- Boucle pour afficher les évènements -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="evenements">
                        <?php if($evenements) {
                                foreach($evenements as $evenement) { 
                        ?>
                        <div class="evenement" data-date="<?php echo $evenement->getDate()?>" data-categorie="<?php echo $evenement->getCategorie()?>" data-titre="<?php echo $evenement->getTitre(); ?>" data-description="<?php echo $evenement->getDescription(); ?>" data-lieu="<?php echo $evenement->getLieu(); ?>">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img style="height: 200px;" src="<?php echo ASSETS; ?>images/uploads/<?php echo $evenement->getImage(); ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $evenement->getTitre(); ?></p>
                                        <p class="card-text text-truncate"><?php echo $evenement->getDescription(); ?></p>
                                        <p id="" visually-hidden></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <!-- Bouton pour voir les détails de l'évènement -->
                                                <a href="details-<?php echo $evenement->getId(); ?>" class="btn btn-sm bg-sombre text-white">Voir Détails</a>
                                            </div>
                                            <small class="text-sombre"><?php echo $evenement->getDate()." ".$evenement->getHeure(); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php   }
                            } 
                        ?>
                    </div>
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
