<?php 
    session_start();
    if(isset($_POST["deco"]))
    {
        session_destroy();
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
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
                        $connexionbd = mysqli_connect("localhost" , "root" , "" , "moduleconnexion");
                        $requeteinfo = "SELECT * FROM utilisateurs WHERE login = '$_SESSION[login]'"; 
                        $query = mysqli_query($connexionbd , $requeteinfo);
                        $info_users = mysqli_fetch_all($query, MYSQLI_ASSOC);

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
                                if(isset($_POST["valimodif"]))
                                    {
                                        $requeteupadate = "UPDATE login prenom nom password SET '$_POST[login]' , '$_POST[prenom]' , '$_POST[nom]' , '$_POST[password]' WHERE id = '$_SESSION[id]'";
                                        $queryupdate = mysqli_query($connexionbd , $requeteupadate);
                                    }
                            }
                        else if($_SESSION["login"] != "admin")
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
                                 if(isset($_POST["valimodif"]))
                                    {
                                        $requeteupadate = "UPDATE login prenom nom password SET '$_POST[login]' , '$_POST[prenom]' , '$_POST[nom]' , '$_POST[password]' WHERE id = '$_SESSION[id]'";
                                        $queryupdate = mysqli_query($connexionbd , $requeteupadate);
                                    }
                            }
            ?>
        <main>
            <h1>Modification du Profil</h1>
            <form action="profil.php" method="POST" class="formIC">
                <label for="login">Login :</label>
                <input type="text" id="insclog" name="login" value="<?php echo $info_users[0]['login'];?>"/> 
                <label for="prenom">Prénom :</label>
                <input type="text" id="inscpre" name="prenom" value="<?php echo $info_users[0]['prenom'];?>"/>
                <label for="nom">Nom :</label>
                <input type="text" id="inscnom" name="nom" value="<?php echo $info_users[0]['nom'];?>"/>
               <!-- Rajouter ancien mdp -->
                <label for="password">Mot de passe</label>
                <input type="password" id="inscmdp" name="password"/>
                <label for="passwordconf">Confirmation Mot de passe</label>
                <input type="password" id="modifconfirm" name="passwordconf"/>
                <input type="submit" name="valimodif" value="Modifier"/>
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
    
 