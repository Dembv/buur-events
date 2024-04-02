<?php 
    // Inclure le fichier de configuration
    include_once('_config.php');

    // Démarrer la session
    session_start();

    // Chargement automatique des classes avec l'autoload personnalisé
    MyAutoload::start();

    // Instanciation du routeur
    $routeur = new Routeur();

    // Définition des routes GET
    $routeur->get('', 'AccueilController@index');
    $routeur->get('evenements', 'EvenementsController@index');
    $routeur->get('ajouter', 'AjouterController@index');
    $routeur->get('modifier', 'ModifierController@index');
    $routeur->get('supprimer', 'SupprimerController@supprimer');
    $routeur->get('annuler', 'AnnulerController@annuler');
    $routeur->get('connexion', 'ConnexionController@index');
    $routeur->get('inscription', 'InscriptionController@index');
    $routeur->get('details', 'DetailsController@index');
    $routeur->get('reservation', 'ReservationController@index');
    $routeur->get('deconnexion', 'ConnexionController@deconnexion');
    $routeur->get('mesreservations', 'MesReservationsController@index');
    $routeur->get('mesevenements', 'MesEvenementsController@index');
    $routeur->get('notification', 'NotificationController@index');

    // Définition des routes POST
    $routeur->post('connexion', 'ConnexionController@connexion');
    $routeur->post('ajouter', 'AjouterController@ajouter');
    $routeur->post('modifier', 'ModifierController@modifier');
    $routeur->post('notification', 'NotificationController@notifier');
    $routeur->post('inscription', 'InscriptionController@inscription');

    // Exécution du routeur pour traiter la requête
    $routeur->demarrer();
?>
