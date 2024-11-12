<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/authentication.css">
    <title>FTFR-Teams ODC-EDT</title>
</head>

<body>

    <!-- Begin Main container -->
    <div class="container">

        <!-- Begin Form Card -->
        <div class="screen">

            <!-- Begin Form Card container -->
            <div class="screen__content">

                <!-- Begin Form login -->
                <form class="login" method="POST">
                    <div class="title-auth-container">
                        <h2 class="title-auth">ODC-EDT Connectez-vous</h2>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="nom" placeholder="Nom d'utilisateur / Email">
                        
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Mot de passe" name="password">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Connectez-vous maintenant</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <!-- Begin Form login -->

                <!-- Begin another login method -->
                <div class="social-login">
                    <h3>Ou Connectez-vous avec</h3>
                    <div class="social-icons">
                        <a href="https://mail.google.com/" class="social-login__icon fab fa-instagram">
                            <img src="../assets/icons/gmail.png" alt="gmail logo">
                        </a>
                        <a href="https://www.facebook.com/vanda.razakamarinasy" class="social-login__icon fab fa-facebook">
                            <img src="../assets/icons/facebook.png" alt="facebook logo">
                        </a>
                    </div>
                </div>
                <!-- Begin another login method -->

                <!-- Begin Link register -->
                <div class="register-link">
                    <a href="./register.php">Inscrivez-vous maintenant</a>
                </div>
                <!-- End Link register -->

            </div>
            <!-- End Form Card container -->

            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>

        </div>
        <!-- End Form Card -->

    </div>
    <!-- End Main container -->

    <?php
// Connexion à la base de données
$servername = "localhost";
$username = "nom";
$password = "mdp";
$dbname = "odc";


// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=odc', 'root', '');

// Récupération des informations d'identification saisies par l'utilisateur 
$username = $_POST['nom'];
$password = $_POST['password'];

// Vérification des informations d'identification dans la base de données 
$stmt = $bdd->prepare("SELECT * FROM emp WHERE nom = :username AND mdp = :password");
$stmt->execute(array(':username' => $username, ':password' => $password));
$resultat = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérification du résultat de la requête
if ($resultat !== false) {
// Les informations d'identification sont correctes, stockage de l'utilisateur dans une session
$_SESSION['username'] = $resultat['nom'];
header("Location: ../index.html");
} else {
// Les informations d'identification sont incorrectes, affichage d'un message d'erreur
echo "<script>
        alert('Nom d\'utilisateur ou mot de passe incorrect.');
    </script>";
}



?>
   
                

</body>



</html>