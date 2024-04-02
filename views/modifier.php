<?php 
    // Définition du titre de la page
    $titre = 'Modifier un évènement';
    // Démarrage de la temporisation de sortie
    ob_start();
?>

<!-- Contenu de la page -->
<div class="row p-md-5 py-2 justify-content-center">
    <div class="col-md-5 col-11 bg-white shadow rounded p-md-4">
        <div class="row">
            <!-- Titre de la section -->
            <h4 class="text-sombre">Modifier un évènement</h4>
        </div>
        <div class="row">
            <!-- Formulaire de modification de l'évènement -->
            <form id="formModifier" method="post" action="modifier-<?php echo $evenement->getId(); ?>" class="vstack g-2" enctype="multipart/form-data">
                <!-- Champ de saisie du titre -->
                <div class="form-group m-2">
                    <label for="titre">Titre</label>
                    <input class="form-control" name="titre" id="titre" value="<?php echo $evenement->getTitre(); ?>" required></input>
                </div>
                <!-- Champ de saisie de la description -->
                <div class="form-group m-2">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" required><?php echo $evenement->getDescription(); ?></textarea>
                </div>
                <!-- Champ de saisie du lieu -->
                <div class="form-group m-2">
                    <label for="lieu">Lieu</label>
                    <input class="form-control" name="lieu" id="lieu" value="<?php echo $evenement->getLieu(); ?>" required></input>
                </div>
                <div class="d-md-flex d-flex m-2">
                    <!-- Champ de saisie de la date -->
                    <div class="form-group w-50 me-3">
                        <label for="date" class="text-sombre">Date</label>
                        <input type="date" class="form-control" name="date" id="date" value="<?php echo $evenement->getDate(); ?>" required>
                    </div>
                    <!-- Champ de saisie de l'heure -->
                    <div class="form-group w-50 ms-3">
                        <label for="heure" class="text-sombre">Heure</label>
                        <input type="time" class="form-control" name="heure" id="heure" value="<?php echo $evenement->getHeure(); ?>" required>
                    </div>
                </div>
                <div class="d-md-flex d-flex m-2">
                    <!-- Sélection de la catégorie -->
                    <div class="form-group w-50 me-3">
                        <label for="categorie">Catégorie</label>
                        <select name="categorie" id="categorie" class="form-select" required>
                            <!-- Parcours des catégories -->
                            <?php
                            if($categories) {
                            foreach($categories as $categorie) {
                                // Vérification de la catégorie de l'évènement
                                if($categorie->getId() ==  $evenement->getCategorie()) {
                            ?>
                            <!-- Option sélectionnée -->
                            <option value="<?php echo $categorie->getId()?>" selected>
                                <?php echo $categorie->getLibelleCategorie();?>
                            </option> 
                            <?php
                                } else { 
                            ?>
                            <!-- Option non sélectionnée -->
                            <option value="<?php echo $categorie->getId()?>">
                                <?php echo $categorie->getLibelleCategorie(); ?>
                            </option>
                            <?php 
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Champ de saisie de la capacité -->
                    <div class="form-group w-50 ms-3">
                        <label for="capacite">Capacité</label>
                        <input type="number" class="form-control" name="capacite" id="capacite" value="<?php echo $evenement->getCapacite(); ?>"></input>
                    </div>
                </div>
                <div class="form-group m-2">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" value="<?php echo $evenement->getImage(); ?>" accept="image/*"></input>
                </div>
                <!-- Bouton de soumission du formulaire -->
                <div class="form-group m-2">
                    <button class="btn bg-clair w-100">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    // Récupération du contenu de la temporisation de sortie et nettoyage de la mémoire tampon
    $contenu = ob_get_clean();
    // Inclusion de la structure de base de la page
    include 'base.php'
?>
