<?php
require_once('include.php');
?>

<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header('Location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="fr">

<head>
    <title>Accueil</title>
    <?php
    require_once('_head/meta.php');
    require_once('_head/link.php');
    require_once('_head/script.php');
    ?>

</head>

<body>
    <?php
    require_once('_menu/menu.php');
    ?>

    <h1>Hello, world!</h1>

    <?php
    require_once('_footer/footer.php');
    ?>
</body>

</html>