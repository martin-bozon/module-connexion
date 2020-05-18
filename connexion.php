<!DOCTYPE html>
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
        <form action="index.php" method="POST">
            <label for="login">Login :</label>
            <input type="text" id="connlog" name="login" required/>
            <label for="password">Mot de passe :</label>
            <input type="password" id="connmdp" name="password" required/>
            <input type="submit" name="valinsc" value="Connexion"/>
        </form>
    </main>

    <footer>
        <h2><a href="index.php">Accueil</a></h2>
        <h3>Copyright Martin Bozon</h3>
        <h2><a href="https://github.com/martin-bozon">GitHub</a></h2>
    </footer>
</body>
</html>