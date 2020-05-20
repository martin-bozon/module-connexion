<?php session_start();?>
<!DOCTYPE html>
<?php
    if(isset($_SESSION["login"]))
        {
            header("Location:index.php");
        }
    else if(isset($_POST["valiconn"]))
        {
            $login = $_POST["login"];
            $mdp = $_POST["password"];
            $connexionbd = mysqli_connect("localhost" , "root" , "" , "moduleconnexion");
            $verifmdp = "SELECT * FROM utilisateurs WHERE login = '$login'";
            $envoieverifmdp = mysqli_query($connexionbd , $verifmdp);
            $resultatverifmdp = mysqli_fetch_all($envoieverifmdp, MYSQLI_ASSOC);
            var_dump($resultatverifmdp);
            if(!empty($resultatverifmdp))
                { 
                    if(password_verify($mdp , $resultatverifmdp[0]["password"]))
                    {
                        session_start();
                        $_SESSION["login"] = $resultatverifmdp[0]["login"];
                        $_SESSION["id"] = $resultatverifmdp[0]["id"];
                       header("Location:index.php");
                    }
                else
                    {
                        $msgerreur =  "Mauvais mot de passe";
                    }
                }
            else
                {
                    $msgerreur = "Ce login n'existe pas";
                }
        
        }
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_mc.css"/>
    <title>Connexion</title>
</head>
<body>
    <header>
        <section id="Hgauche">
            <h2><a href="index.php">Accueil</a></h2>
        </section>
        <section id="Hdroite">
            <h2><a href="inscription.php">Inscription</a></h2>
        </section>
    </header>

    <main>
        <h1>Formulaire de Connexion</h1>
        <form action="connexion.php" method="POST" class="formIC">
            <label for="login">Login :</label>
            <input type="text" id="connlog" name="login" required/>
            <label for="password">Mot de passe :</label>
            <input type="password" id="connmdp" name="password" required/>
            <input type="submit" name="valiconn" value="Connexion"/>
                <?php
                    if(isset($msgerreur))
                        {
                ?>
                    <p class="msgrerreur">  
                <?php
                            echo $msgerreur;
                ?>
                    </p>
                <?php          
                        }
                ?>
        </form>
    </main>

    <footer>
        <h2><a href="index.php">Accueil</a></h2>
        <h3>Copyright Martin Bozon</h3>
        <h2><a href="https://github.com/martin-bozon">GitHub</a></h2>
    </footer>
</body>
</html>