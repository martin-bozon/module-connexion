<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_mc.css"/>
    <title>Profil</title>
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
        <form action="profil.php" method="POST">
        <!-- ajouter php pour info profil -->
            <label for="login">Login :</label>
            <input type="text" id="insclog" name="login"/> 
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