<?php session_start();
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
    <title>Accueil</title>
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
                                <h2><a href="profil.php">Profil</a></h2>
                                <h2><a href="admin.php">Admin</a></h2>
                                <form action="" method="POST" class="deco">
                                    <input type="submit" name="deco" value="Déconnexion"/>
                                </form>
                            </section>
                        </header>

                        <main>
                            <section>
                                <h1>Bonjour Maître</h1>
                                <h3>Comment puis-je vous aider ?</h3>
                            </section>
                        </main>
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
                                <h2><a href="profil.php">Profil</a></h2>
                                <form action="" method="POST" class="deco">
                                    <input type="submit" name="deco" value="Déconnexion"/>
                                </form>
                            </section>
                        </header>

                        <main>
                            <section>
                                <h1>Bonjour <?php echo $_SESSION["login"];?></h1>
                                <h3>Comment vas tu ?</h3>
                            </section>
                        </main>
    <?php
                    }
    ?>
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
                                <h2><a href="inscription.php">Insccription</a>
                                <h2><a href="connexion.php">Connexion</a>
                            </section>
                        </header>

                        <main>
                            <section>
                                <h1>Bienvuenue sur mon site !</h1>
                                <h3>Rejoins nous vite !</h3>
                            </section>
                        
                        </main>
<?php
            }
?>
                <footer>
                    <h2><a href="index.php">Accueil</a></h2>
                    <h3>Copyright Martin Bozon</h3>
                    <h2><a href="https://github.com/martin-bozon">GitHub</a></h2>
                </footer>
               
</body>
</html>