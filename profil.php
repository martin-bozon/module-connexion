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
                        $requeteinfo = "SELECT * FROM utilisateurs WHERE login = '$_SESSION[login]'"; //requete pour afficher les infos dans le form                        
                        $query = mysqli_query($connexionbd , $requeteinfo);
                        $info_users = mysqli_fetch_all($query, MYSQLI_ASSOC);

                        var_dump($info_users[0]['login']);
                        if(isset($_POST["valimodif"]) && !empty($_POST))
                            {  
                                
                                $login = $_POST["login"];
                                $prenom = $_POST["prenom"];
                                $nom = $_POST["nom"];
                                $id = $_SESSION["id"];
                                $requetelogin ="SELECT COUNT(*) FROM utilisateurs WHERE login='$login"; //requete pour vérifier si le login existe
                                $querylogin = mysqli_query($connexionbd , $requetelogin);
                                $info_login = mysqli_fetch_all($querylogin, MYSQLI_ASSOC);

                                $requeteupadate = "UPDATE utilisateurs SET prenom='$prenom' , nom='$nom' WHERE id = '$id'";
                                $queryupdate = mysqli_query($connexionbd , $requeteupadate);                                            

                                if(isset($login))
                                    if($info_login == 0)                            
                                        {
                                            $requeteLupadate = "UPDATE utilisateurs SET login='$login' WHERE id = '$id'";
                                            $queryLupdate = mysqli_query($connexionbd , $requeteLupadate); 
                                        }
                                else
                                    {
                                        echo "Ce login existe déjà";
                                    }
                                // if(isset($_POST["nwpassword"]) && !empty($_POST["nwpassword"]))
                                //     {
                                //         if(password_verify($_POST["oldpassword"] , $_SESSION["password"]))
                                //             {
                                //                 $mdpup_hache = password_hash($_POST["nwpassword"], PASSWORD_DEFAULT);
                                //                 if(password_verify($mdpup_hache , $_SESSION["password"]))
                                //                     {
                                //                         if($_POST["nwpassword"] == $_POST["passwordconf"])
                                //                              {                                                
                                //                                 $requetemdpuptade = "UPDATE utilisateurs SET password = $mdpup_hache , WHERE id = '$_SESSION[id]'";
                                //                                 $querymdpupdate = mysqli_query($connexionbd , $requetemdpupadate);
                                //                             }
                                //                     }
                                //             }                                       
                                //     }     
                                header("Location:profil.php");                           
                            }
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
                <label for="oldpassword">Ancien Mot de passe :</label>
                <input type="password" id="oldmdp" name="oldpassword"/>
                <label for="nwpassword"> Nouveau Mot de passe :</label>
                <input type="password" id="inscmdp" name="nwpassword"/>
                <label for="passwordconf">Confirmation Mot de passe :</label>
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
    
 