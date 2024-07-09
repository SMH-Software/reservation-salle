<?php 
session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php 

require_once("con1.php");

$req="SELECT * FROM enseignant";
$res=$pdo->prepare($req);
$res->execute();


$reqR="SELECT * FROM reservation";
$resR=$pdo->prepare($reqR);
$resR->execute();



//SELECT nom_colonne1 FROM `table1` WHERE EXISTS (SELECT nom_colonne2 FROM `table2`WHERE nom_colonne3 = 10)


?>
<?php 

if(isset($_GET['message'])){

    $message = $_GET['message'];
}
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
            <?php if(isset($message)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $message ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-md-9">
                    <h1>Liste des enseignants</h1>
                </div>
                <div class="col-md-3">
                    <a href="ajout.php" class="btn btn-outline-info text-rigth"><i class="fa fa-plus"></i> Ajouter Enseignant </a>
                </div>

            </div><br>

            <table class="table table-hover">
                <thead class="bg-dark text-light">
                    <th><h4 class="text-center">Nom</h4></th>
                    <th><h4 class="text-center">Prenom</h4></th>
                    <th><h4 class="text-center">Nombre d'Heure</h4></th>
                    <th><h4 class="text-center">Liste Reservation</h4></th>
                    <th><h4 class="text-center">Options</h4></th>
                </thead>
                <tbody>s
                    <?php while($ens=$res->fetch() and $tab=$resR->fetch()) { ?>

                    <tr class="<?php echo $ens['login']==$tab['login']? "table-success":"table-danger"?>" >

                        <td><h5 class="text-center"><?php echo $ens['nom'] ?></h5></td>
                        <td><h5 class="text-center"><?php echo $ens['prenom'] ?></h5></td>
                        <td><h5 class="text-center"><?php echo $ens['nbHeure'] ?></h5></td >
                        <td>
                            <h5 class="text-center">
                              <i class="<?php echo $tab['login']==$ens['login']? "":"fa fa-eye-slash"?>"></i><a href="individual_list.php?idRLog=<?php echo $tab['login'] ?>" title="Liste réservation"><i class="<?php echo $tab['login']==$ens['login']? "fa fa-eye":""?>"></i></a>
                            </h5>
                        </td>
                        <td>
                            <h5 class="text-center">
                               
                            </h5>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </body>
</html>