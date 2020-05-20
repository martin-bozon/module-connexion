<?php 
    session_start();
    if(isset($_POST["deco"]))
    {
        session_destroy();
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<?php

    //requête à faire sous conditions
    $connexionbd = mysqli_connect("localhost" , "root" , "" , "moduleconnexion");
    $requeteinfo = "SELECT * FROM utilisateurs WHERE login = '$_POST[login]'"; //requete a vérifier
    $query = mysqli_query($connexionbd , $requeteinfo);
    $info_users = mysqli_fetch_all($query , MYSQLI_ASSOC);

?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_mc.css"/>
    <title>Profil</title>
</head>
    <body>
            <?php
                
                if(isset($_SESSION["login"]))
                    {
                        
                        if($_SESSION["login"] == "admin")
                            {
            ?>
                                <header>
                                    <section id="Hgauche">
                                        <h2><a href="index.php">Accueil</a></h2>
                                    </section>
                                    <section id="Hdroite">
                                        <h2><a href="admin.php">Admin</a>
                                        <form action="" method="POST">
                                            <input type="submit" name="deco" value="Déconnexion"/>
                                        </form>
                                    </section>
                                </header>
            <?php
                            }
                        else
                            {
            ?>
                                <header>
                                    <section id="Hgauche">
                                        <h2><a href="index.php">Accueil</a></h2>
                                    </section>
                                    <section id="Hdroite">
                                        <form action="" method="POST">
                                            <input type="submit" name="deco" value="Déconnexion"/>
                                        </form>
                                    </section>
                                </header>
            <?php
                            }
            ?>
        <main>
            <h1>Modification du Profil</h1>
            <form action="profil.php" method="POST">
            <!-- ajouter php pour info profil -->
                <label for="login">Login :</label>
                <input type="text" id="insclog" name="login" value=""/> 
                <label for="prenom">Prénom :</label>
                <input type="text" id="inscpre" name="prenom"/>
                <label for="nom">Nom :</label>
                <input type="text" id="inscnom" name="nom"/>
                <label for="password">Mot de passe</label>
                <input type="password" id="inscmdp" name="password"/>
                <label for="passwordconf">Confirmation Mot de passe</label>
                <input type="password" id="inscconfirm" name="passwordconf"/>
                <input type="submit" name="valinsc" value="Modifier"/>
            </form>
        </main>

        <footer>
            <h2><a href="index.php">Accueil</a></h2>
            <h3>Copyright Martin Bozon</h3>
            <h2><a href="https://github.com/martin-bozon">GitHub</a></h2>
        </footer>
    </body>
</html>
    <?php
                    }
        else
            {
                header("Location:index.php");
            }
    ?>
    
 