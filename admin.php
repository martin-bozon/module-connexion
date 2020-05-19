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
</body>
</html>