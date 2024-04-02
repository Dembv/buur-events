function validerInscription() {

    // Fonction de validation de l'email
    function validerEmail(email) {
        let re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    
    // Fonction de validation du téléphone
    function validerTelephone(telephone) {
        let re = /^7\d{8}$/;
        return re.test(telephone);
    }

    // Fonction pour vérifier si une chaîne commence par une lettre majuscule
    function commencerParMajuscule(chaine) {
        let re = /^[A-Z]/;
        return re.test(chaine);
    }

    // Récupérer les valeurs des champs
    let nom = $('#nom').val();
    let prenom = $('#prenom').val();
    let email = $('#email').val();
    let telephone = $('#telephone').val();
    let adresse = $('#adresse').val();
    let motdepasse = $('#password').val();

    // Créér les variables devant contenir les messages d'erreur
    let spanPrenom = $('#spanPrenom');
    let spanNom = $('#spanNom');
    let spanEmail = $('#spanEmail');
    let spanTelephone = $('#spanTelephone');
    let spanAdresse = $('#spanAdresse');
    let spanPassword = $('#spanPassword');

    // Valider chaque champ
    // Prénom
    if (prenom.trim() === '') {
        spanPrenom.html("Veuillez saisir votre prénom");
        spanPrenom.css('color', "red");
        return false;
    } else if (!commencerParMajuscule(prenom)) {
        spanPrenom.html("Le prénom doit commencer par une lettre majuscule");
        spanPrenom.css('color', "red");
        return false;
    } else {
        spanPrenom.html("");
    }
    
    // Nom
    if (nom.trim() === '') {
        spanNom.html("Veuillez saisir votre nom");
        spanNom.css('color', "red");
        return false;
    } else if (!commencerParMajuscule(nom)) {
        spanNom.html("Le nom doit commencer par une lettre majuscule");
        spanNom.css('color', "red");
        return false;
    } else {
        spanNom.html("");
    }
    
    // Email
    if (!validerEmail(email)) {
        spanEmail.html('Veuillez saisir une adresse email valide');
        spanEmail.css('color', "red");
        return false;
    } else {
        spanEmail.html("");
    }
    
    // Numéro de téléphone
    if (!validerTelephone(telephone)) {
        spanTelephone.html('Veuillez saisir un numéro de téléphone valide (commençant par 7 et contenant 9 chiffres)');
        spanTelephone.css('color', "red");
        return false;
    } else {
        spanTelephone.html("");
    }
    
    // Adresse
    if (adresse.trim() === '') {
        spanAdresse.html("Veuillez saisir votre adresse");
        spanAdresse.css('color', "red");
        return false;
    } else {
        spanAdresse.html("");
    }
    
    // Mot de Passe
    if (motdepasse.trim().length < 6) {
        spanPassword.html('Le mot de passe doit contenir au moins 6 caractères');
        spanPassword.css('color', "red");
        return false;
    } else {
        spanPassword.html("");
    }

    return true;
}


function validerCreerEvenement() {
    // Fonction pour vérifier si une chaîne commence par une lettre majuscule
    function commencerParMajuscule(chaine) {
        let re = /^[A-Z]/;
        return re.test(chaine);
    }

    // Récupérer les valeurs des champs
    let titre = $('#titre').val();
    let description = $('#description').val();
    let lieu = $('#lieu').val();
    let date = $('#date').val();
    let heure = $('#heure').val();
    let categorie = $('#categorie').val();
    let capacite = $('#capacite').val();
    let image = $('#image').val();

    // Créér les variables devant contenir les messages d'erreur
    let spanTitre = $('#spanTitre');
    let spanDescription = $('#spanDescription');
    let spanLieu = $('#spanLieu');
    let spanDate = $('#spanDate');
    let spanHeure = $('#spanHeure');
    let spanCategorie = $('#spanCategorie');
    let spanCapacite = $('#spanCapacite');
    let spanImage = $('#spanImage');

    let dateEntree = new Date(date).valueOf();
    let dateCurrent = new Date().valueOf();

    // Valider chaque champ
    // Titre
    if (titre.trim() === '') {
        spanTitre.html("Veuillez saisir le titre de votre événement");
        spanTitre.css('color', "red");
        return false;
    } else if (!commencerParMajuscule(titre)) {
        spanTitre.html("Le titre doit commencer par une lettre majuscule");
        spanTitre.css('color', "red");
        return false;
    } else {
        spanTitre.html("");
    }

    // Description
    if (description.trim() === '') {
        spanDescription.html("Veuillez saisir la description de votre événement");
        spanDescription.css('color', "red");
        return false;
    } else if (!commencerParMajuscule(description)) {
        spanDescription.html("La description doit commencer par une lettre majuscule");
        spanDescription.css('color', "red");
        return false;
    } else {
        spanDescription.html("");
    }

    // Lieu
    if (lieu.trim() === '') {
        spanLieu.html("Veuillez donner le lieu de votre événement");
        spanLieu.css('color', "red");
        return false;
    } else {
        spanLieu.html("");
    }
    
    // Date
    if (date.trim() === '') {
        spanDate.html("Veuillez saisir la date de votre événement");
        spanDate.css('color', "red");
        return false;
    } else if(dateEntree < dateCurrent){
        spanDate.html("La date saisie est passée");
        spanDate.css('color', "red");
        return false;
    } else {
        spanDate.html("");
    }
    
    // Heure
    if (heure.trim() === '') {
        spanHeure.html("Veuillez donner l'heure de votre événement");
        spanHeure.css('color', "red");
        return false;
    } else {
        spanHeure.html("");
    }
    
    // Catégorie
    if (categorie.trim() === '') {
        spanCategorie.html("Veuillez saisir la nature de votre événement");
        spanCategorie.css('color', "red");
        return false;
    } else {
        spanCategorie.html("");
    }
    
    // Capacité
    if (capacite.toString().trim() === '') {
        spanCapacite.html("Veuillez saisir la capacité de votre événement");
        spanCapacite.css('color', "red");
        return false;
    } else if (capacite <= 1) {
        spanCapacite.html("Veuillez saisir une capacité valide (un nombre positif)");
        spanCapacite.css('color', "red");
        return false;
    } else {
        spanCapacite.html("");
    }
    
    // Image
    if (image.trim() === '') {
        spanImage.html("Veuillez donner le chemin de l'image de votre événement");
        spanImage.css('color', "red");
        return false;
    } else {
        spanImage.html("");
    }

    return true;
}


function validerConnexion() {
    // Fonction de validation de l'email
    function validerEmail(email) {
        let re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    // Récupérer les valeurs des champs
    let email = $('#email').val();
    let motdepasse = $('#password').val();

    // Créér les variables devant contenir les messages d'erreur
    let spanEmail = $('#spanEmail');
    let spanPassword = $('#spanPassword');

    // Valider chaque champ
    
    // Email
    if (!validerEmail(email)) {
        spanEmail.html('Veuillez saisir une adresse email valide');
        spanEmail.css('color', "red");
        return false;
    } else {
        spanEmail.html("");
    }
    
    // Mot de Passe
    if (motdepasse.trim().length < 6) {
        spanPassword.html('Le mot de passe doit contenir au moins 6 caractères');
        spanPassword.css('color', "red");
        return false;
    } else {
        spanPassword.html("");
    }

    return true;
}


$(document).ready(function(){
    // Gestion des filtres de date et de catégorie
    $('#filtres div select').change(function() {
        let selectedDate = $('#periode').val();
        let selectedCategory = parseInt($('#categorie').val());
        let currentDate = new Date();

        $('.evenement').hide(); // Masquer tous les événements
        
        $('.evenement').each(function() {
            let eventDate = new Date($(this).data('date'));
            let eventCategory = parseInt($(this).data('categorie'));
            
            if ((selectedDate == 1 && (eventDate.valueOf() >= currentDate.valueOf())) ||
                (selectedDate == 2 && (eventDate.valueOf() < currentDate.valueOf())) ||
                selectedDate == 0) {
                if (selectedCategory == 0 || selectedCategory == eventCategory) {
                    $(this).show(); // Afficher l'événement si correspondance de date et de catégorie
                }
            }
        });
    });

    // Gestion de la recherche d'événements
    $('#rechercheForm').submit(function(event){
        event.preventDefault();

        let selectedRecherche = $('#rechercheInput').val();
        $('.evenement').hide();

        $('.evenement').each(function() {
            if ($(this).data('titre').indexOf(selectedRecherche) !== -1 || $(this).data('description').indexOf(selectedRecherche) !== -1 || $(this).data('lieu').indexOf(selectedRecherche) !== -1) {
                $(this).show(); // Afficher l'événement si correspondance de titre, description ou lieu
            }
        });
    });

    // Validation et soumission du formulaire d'inscription
    $('#formInscription').submit(function(event) {
        event.preventDefault();
        if (!validerInscription()) {
            return;
        } else {
            // Récupérer les données du formulaire
            let prenom = $('#prenom').val();
            let nom = $('#nom').val();
            let email = $('#email').val();
            let telephone = $('#telephone').val();
            let adresse = $('#adresse').val();
            let password = $('#password').val();
            

            // Effectuer une demande AJAX
            $.ajax({
                type: 'POST',
                url: 'inscription',
                data: {
                        'prenom' : prenom,
                        'nom' : nom,
                        'email' : email,
                        'telephone' : telephone,
                        'adresse' : adresse,
                        'password' : password
                },
                dataType: 'json',
                success: function(response) {
                    // Gérer la réponse du serveur
                    //this.submit();
                    // Vous pouvez rediriger l'utilisateur ici ou effectuer d'autres actions en fonction de la réponse du serveur
                    if(!response.success) {
                        $('#spanButton').html(response.message);
                        $('#spanButton').css('color', 'red');
                    } else {
                        window.location.href = 'http://localhost/M1-Info/complements-web/projet-web/' + response.message;
                    }
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs AJAX
                    //console.error(xhr.responseText);
                }
            });  
        }
    });

    // Validation et soumission du formulaire de création d'événement
    $('#formAjouter').submit(function(event) {
        event.preventDefault();
        if (!validerCreerEvenement()) {
            return;
        } else {
            this.submit();
        }
    });

    // Validation et soumission du formulaire de connexion
    $('#formConnexion').submit(function(event) {
        event.preventDefault();
        if (!validerConnexion()) {
            return;
        } else {

            // Récupérer les données du formulaire
            let username = $('#email').val();
            let password = $('#password').val();
            

            // Effectuer une demande AJAX
            $.ajax({
                type: 'POST',
                url: 'connexion',
                data: {
                        'email' : username,
                        'password' : password
                },
                dataType: 'json',
                success: function(response) {
                    // Gérer la réponse du serveur
                    //this.submit();
                    // Vous pouvez rediriger l'utilisateur ici ou effectuer d'autres actions en fonction de la réponse du serveur
                    if(!response.success) {
                        $('#spanButton').html(response.message);
                        $('#spanButton').css('color', 'red');
                    } else {
                        //$('#spanButton').html(response.message);
                        //$('#spanButton').css('color', 'green');
                        window.location.href = 'http://localhost/M1-Info/complements-web/projet-web/' + response.message;
                    }
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs AJAX
                    //console.error(xhr.responseText);
                }
            });  
        }
    }); 
});
