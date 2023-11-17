<?php
session_start();

// Inclure le fichier de connexion à la base de données
require_once 'connexionDB.php';

// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifier le mot de passe dans la base de données
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $db_password = $user['password'];

        // Vérifier si le mot de passe correspond
        if (password_verify($password, $db_password)) {
            // Enregistrer le nom d'utilisateur dans la session
            $_SESSION['username'] = $username;

            // Rediriger vers la page principale
            header('Location: accueil.php');
            exit;
        }
    }

    // Rediriger vers la page d'erreur
    header('Location: error.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EagleRiver</title>
    <link rel="stylesheet" href="STYLEcss/STYLEindex.css" />
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <h1>Login</h1>
            <form action="utilisateur.php" method="post">
                <div class="field">
                    <?php
                    // Afficher un message d'erreur en cas d'échec de connexion
                    if (isset($_SESSION['login_error'])) {
                        echo '<div class="error">Nom d\'utilisateur ou mot de passe incorrect</div>';
                        unset($_SESSION['login_error']);
                    }
                    ?>
                    <form method="post" action="">
                        <input type="text" id="username" name="username" placeholder="username" required />
                        <input type="password" id="password" name="password" placeholder="password" required />
                        <br />
                        <input type="submit" class="btn" value="enter" />
                        <br />
                </div>
            </form>
        </div>
    </div>

</body>

</html>