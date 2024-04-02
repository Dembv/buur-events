<?php
    use \PHPMailer\PHPMailer\PHPMailer;
    use \PHPMailer\PHPMailer\Exception;

    require 'resources/phpmailer/src/Exception.php';
    require 'resources/phpmailer/src/PHPMailer.php';
    require 'resources/phpmailer/src/SMTP.php';

    class NotificationController
    {
        public function index($id) {
            // Instanciation du middleware d'authentification
            $authMiddleware = new AuthMiddleware();

            // Définition de la page active dans la session
            $_SESSION['page_active'] = "notification-$id";
            
            // Appliquer le middleware d'authentification
            $authMiddleware->handle();

            // Vérification de la connexion de l'utilisateur
            $estConnecter = UtilisateurModel::estConnecter();

            // Récupération de l'événement à modifier en fonction de son ID
            $evenementModel = new EvenementModel();
            $evenement = $evenementModel->getEvenementById($id);

            // Inclusion de la vue des événements de l'utilisateur
            include_once(VIEWS.'notification.php');
        }

        public function notifier($data, $id) {
            if ($data) {
                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'dembaguisse99@gmail.com';
                $mail->Password = 'zvcwekaaktsfmztg';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('dembaguisse99@gmail.com', 'Buur-Events');
                $mail->isHTML(true);

                $evenementModel = new EvenementModel();
                $evenement = $evenementModel->getEvenementById($id);

                $reservationModel = new ReservationModel();
                $reservations = $reservationModel->getReservationsByEvenement($id);
                
                $utilisateurModel = new UtilisateurModel();
                foreach ($reservations as $reservation) {
                    $utilisateur = $utilisateurModel->getUtilisateurById($reservation->getUtilisateur());
                    $mail->addAddress($utilisateur->getEmail());
                }
                
                $mail->Subject = $data['objet'];
                $mail->Body = $data['message'];

                $mail->send();

                header("Location: mesevenements");

                exit;
            }
        }
    }
?>