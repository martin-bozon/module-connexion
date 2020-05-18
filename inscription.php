<!DOCTYPE html>
<?php
if(isset($_POST["valinsc"]))
    {
        $login = $_POST["login"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $connexionbd = mysqli_connect("localhost" , "root" ,"", "moduleconnexion"); //connecxion à la bdb
        $veriflogin = "SELECT login FROM utilisateurs WHERE login = '$login'";
        $envoieverfilogin = mysqli_query($connexionbd , $veriflogin);
        $resultatverifL = mysqli_fetch_all($envoieverfilogin); //récupère résultat de la requete

        if(empty($resultatverifL))
            {
                if($_POST["password"] == $_POST["passwordconf"])
                    {
                        $mdp_hache = password_hash($_POST["password"], PASSWORD_DEFAULT); //cryptage du mdp
                        $requete = "INSERT INTO utilisateurs (login , prenom , nom , password) VALUES ('$login' , '$prenom' , '$nom', '$mdp_hache')"; // requete
                        $envoierequete = mysqli_query($connexionbd , $requete); //envoie de la requete
                        mysqli_close($connexionbd);
                        header("Location:connexion.php");
                    }
                else    
                    {
                        $msgerreur =  "Mot de passe de différents";
                    }
            }
        else
            {
                $msgerreur = "Ce login existe déjà";
            }
    }

?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_mc.css"/>
    <title>Inscription</title>
</head>
<body>
    <header>
        <section id="Hgauche">
            <h2><a href="index.php">Accueil</a></h2>
        </section>
        <section id="Hdroite">
            <h2><a href="connexion.php">Connexion</a></h2>
        </section>
    </header>

    <main>
        <form action="inscription.php" method="POST">
            <label for="login">Login :</label>
            <input type="text" id="insclog" name="login" required/>
            <label for="prenom">Prénom :</label>
            <input type="text" id="inscpre" name="prenom" required/>
            <label for="nom">Nom :</label>
            <input type="text" id="inscnom" name="nom" required/>
            <label for="password">Mot de passe :</label>
            <input type="password" id="inscmdp" name="password" required/>
            <label for="passwordconf">Confirmation Mot de passe :</label>
            <input type="password" id="inscconfirm" name="passwordconf" required/>
            <input type="submit" name="valinsc" value="Inscription"/>
                <?php 
                    if(isset($msgerreur))
                        {
                ?>
                    <p class="msgerreur">
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