<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/authentication.css">
    <title>FTFR-Teams EDT</title>
</head>
<body>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=odc', 'root', '');
} catch(Exception $e) {
    die('Erreur: '.$e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['confirmermdp'])) {
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $confirmermdp = $_POST['confirmermdp'];

        if ($mdp === $confirmermdp) {
            $inserer = $bdd->prepare('INSERT INTO emp(nom, mdp, confirmermdp) VALUES(?, ?, ?)');
            $inserer->execute(array($nom, $mdp, $confirmermdp));
            echo '<p style="color: green;">Inscription réussie !</p>';
        } else {
            echo '<p style="color: red;">Les mots de passe ne correspondent pas.</p>';
        }
    } else {
        echo '<p style="color: red;">Veuillez remplir tous les champs.</p>';
    }
}
?>

<!-- Begin Main container -->
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form class="register" method="POST">
                <div class="title-auth-container">
                    <h2 class="title-auth">ODC-EDT <br> Register with our timetable</h2>
                </div>
                <div class="register__field">
                    <input type="text" class="register__input" placeholder="Nom d'utilisateur / Email" name="nom" required />
                </div>
                <div class="register__field">
                    <input type="password" class="register__input" placeholder="Mot de passe" name="mdp" required />
                </div>
                <div class="register__field">
                    <input type="password" class="register__input" placeholder="Confirmation mot de passe" name="confirmermdp" required />
                </div>
                <button type="submit" class="button register__submit">
                    <span class="button__text">Inscrivez-vous maintenant</span>
                </button>
            </form>

            <div class="social-register">
                <h3>Ou Connectez-vous avec</h3>
                <div class="social-icons">
                    <a href="javascript:void()" class="social-login__icon fab fa-instagram">
                        <img src="../assets/icons/gmail.png" alt="gmail logo">
                    </a>
                    <a href="javascript:void()" class="social-login__icon fab fa-facebook">
                        <img src="../assets/icons/facebook.png" alt="facebook logo">
                    </a>
                </div>
            </div>

            <div class="signin-link">
                <a href="./login.php">Connectez</a>
            </div>
        </div>
        
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>

<?php
$reponse = $bdd->query('SELECT * FROM emp');
while ($etoleizy = $reponse->fetch()) {
    echo '<p>'.$etoleizy['nom'].' -- '.$etoleizy['mdp'].' -- '.$etoleizy['confirmermdp'].'</p>';
}
?>

</body>
</html>
