<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Titre de la page -->
    <title><?php echo $titre ?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo ASSETS; ?>images/logo.png" type="image/x-icon">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>css/styles.css">
</head>
<body>
    <div class="container-fluid">
        <!-- Inclusion de l'en-tête -->
        <?php include_once(VIEWS."includes/header.php");?>
        <!-- Contenu de la page -->
        <?php echo $contenu ?>
        <!-- Inclusion du pied de page -->
        <?php include_once(VIEWS."includes/footer.php");?>
    </div>
    <!-- Scripts JavaScript -->
    <script src="<?php echo ASSETS; ?>js/jquery-3.7.1.js"></script>
    <script src="<?php echo ASSETS; ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo ASSETS; ?>js/mon-script1.js"></script>
</body>
</html>
