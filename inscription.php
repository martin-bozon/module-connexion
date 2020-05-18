<!DOCTYPE html>
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
        <form action="connexion.php" method="POST">
            <label for="login">Login :</label>
            <input type="text" id="insclog" name="login" required/>
            <label for="prenom">Prénom :</label>
            <input type="text" id="inscpre" name="prenom" required/>
            <label for="nom">Nom :</label>
            <input type="text" id="inscnom" name="nom" required/>
            <label for="password">Mot de passe</label>
            <input type="password" id="inscmdp" name="password" required/>
            <label for="passwordconf">Confirmation Mot de passe</label>
            <input type="password" id="inscconfirm" name="passwordconf" required/>
            <input type="submit" name="valinsc" value="Inscription"/>
        </form>
    </main>

    <footer>
        <h2><a href="index.php">Accueil</a></h2>
        <h3>Copyright Martin Bozon</h3>
        <h2><a href="https://github.com/martin-bozon">GitHub</a></h2>
    </footer>
</body>
</html>