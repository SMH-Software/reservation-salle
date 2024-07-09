<?php 
session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php 

require_once("con1.php");

$req="SELECT * FROM enseignant WHERE login NOT IN(SELECT login FROM reservation)";
$res=$pdo->prepare($req);
$res->execute();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php include("link.php") ?>
    </head>
    <style>

    </style>
    <body>
        <div class="container-fluid" style="margin-top:10px;">
            <a href="liens.php"class="btn btn-outline-info" style="font-size:25px;">Aller au Menu <i class="fa fa-tachometer" aria-hidden="true"></i></a>
        </div>

        <div class="container col-md-10" style="margin-top:70px;">
            <h1>Liste des enseignants n'ayant pas effectué de reservation</h1><br>
            <table class="table">
                <thead class="bg-danger text-light">
                    <th><h5>Login</h5></th>
                    <th><h5>Nom</h5></th>
                    <th><h5>Prenom</h5></th>
                </thead>
                <tbody>
                    <?php while($ens=$res->fetch()) { ?>
                    <tr>
                        <td><h5><?php echo $ens['login'] ?></h5></td>
                        <td><h5><?php echo $ens['nom'] ?></h5></td>
                        <td><h5><?php echo $ens['prenom'] ?></h5></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </body>
</html>