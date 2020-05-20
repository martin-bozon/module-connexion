<?php session_start();
if(isset($_POST["deco"]))
 {
     session_destroy();
     header('Location:index.php');
 }
?>
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
                               <h2><a href="profil.php">Profil</a>
                               <form action="" method="POST">
                                   <input type="submit" name="deco" value="Déconnexion"/>
                               </form>
                           </section>
                       </header>

                       <main>
                            <h1>Gestion des utilisateurs</h1>
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
   <?php
                   }
               else
                   {
                     header("Location:index.php");
                   }
            }
   ?>