<!DOCTYPE html>
<?php
    $connexionbd = mysqli_connect("localhost" , "root" , "" , "moduleconnexion");
    $requeteinfo = "SELECT * FROM utilisateurs";
    $query = mysqli_query($connexionbd , $requeteinfo);
    $info_users = mysqli_fetch_all($query , MYSQLI_ASSOC);
?>

<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_mc.css"/>
    <title>Admin</title>
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
        <table id="tableau_users">
            <thead>
                <?php
                    foreach($info_users[0] as $champ => $info)
                        {
                ?>
                <th><?php echo $champ;?></th>
                    <?php
                        }
                    ?>
            </thead>
            <tbody>
                <?php
                    foreach($info_users as $user)
                        {
                ?>
                <tr>
                    <?php
                        foreach($user as $champ => $info)
                            {
                    ?>
                    <td><?php echo $info;?></td>
                        <?php
                            }
                        ?>
                </tr>
                    <?php
                        }
                    ?>
            </tbody>
        </table>
    </main>

    <footer>
        <h2><a href="index.php">Accueil</a></h2>
        <h3>Copyright Martin Bozon</h3>
        <h2><a href="https://github.com/martin-bozon">GitHub</a></h2>
    </footer>
</body>
</html>