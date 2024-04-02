<?php 
    // Définition du titre de la page
    $titre = 'Créer un évènement';
    
    // Mise en mémoire tampon du contenu HTML
    ob_start();
?>

    <!-- Contenu de la page -->
    <div class="row p-md-5 py-2 justify-content-center">
        <div class="col-md-5 col-11 bg-white shadow rounded p-md-4">
            <div class="row">
                <!-- Titre de la section -->
                <h4 class="text-sombre">Ajouter un évènement</h4>
            </div>
            <div class="row">
                <!-- Formulaire pour ajouter un événement -->
                <form id="formAjouter" action="ajouter" method="post" class="vstack g-2" enctype="multipart/form-data">
                    <!-- Champ pour le titre de l'événement -->
                    <div class="form-group m-2">
                        <label for="titre">Titre</label>
                        <input class="form-control" name="titre" id="titre"></input>
                        <span id="spanTitre"></span>
                    </div>
                    <!-- Champ pour la description de l'événement -->
                    <div class="form-group m-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                        <span id="spanDescription"></span>
                    </div>
                    <!-- Champ pour le lieu de l'événement -->
                    <div class="form-group m-2">
                        <label for="lieu">Lieu</label>
                        <input class="form-control" name="lieu" id="lieu"></input>
                        <span id="spanLieu"></span>
                    </div>
                    <!-- Champs pour la date et l'heure de l'événement -->
                    <div class="d-md-flex d-flex m-2">
                        <div class="form-group w-50 me-3">
                            <label for="date" class="text-sombre">Date</label>
                            <input type="date" class="form-control" name="date" id="date">
                            <span id="spanDate"></span>
                        </div>
                        <div class="form-group w-50 ms-3">
                            <label for="heure" class="text-sombre">Heure</label>
                            <input type="time" class="form-control" name="heure" id="heure">
                            <span id="spanHeure"></span>
                        </div>
                    </div>
                    <!-- Champs pour la catégorie et la capacité de l'événement -->
                    <div class="d-md-flex d-flex m-2">
                        <div class="form-group w-50 me-3">
                            <label for="categorie">Catégorie</label>
                            <select name="categorie" id="categorie" class="form-select">
                            <?php
                                // Affichage des options de sélection des catégories
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
                            <span id="spanCategorie"></span>
                        </div>
                        <div class="form-group w-50 ms-3">
                            <label for="capacite">Capacité</label>
                            <input type="number" class="form-control" name="capacite" id="capacite"></input>
                            <span id="spanCapacite"></span>
                        </div>
                    </div>
                    <!-- Champ pour télécharger l'image de l'événement -->
                    <div class="form-group m-2">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        <span id="spanImage"></span>
                    </div>
                    <!-- Bouton de soumission du formulaire -->
                    <div class="form-group m-2">
                        <button class="btn bg-clair w-100">Créer</button>
                        <span id="spanButton"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    // Récupération du contenu et inclusion de la base de la page
    $contenu = ob_get_clean();
    include 'base.php';
?>
