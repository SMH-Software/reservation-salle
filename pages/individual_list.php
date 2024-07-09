<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php 
require_once("con1.php");

$log = isset($_GET['idRLog']) ? $_GET['idRLog']: "";

$req="SELECT R.ID, R.ID_salle, R.date, S.Type, E.nom, E.prenom, E.login FROM reservation R, salle S, enseignant E
WHERE E.login='$log' and R.ID_salle=S.ID_salle";

$res=$pdo->prepare($req);
$res->execute();

$req2="SELECT R.ID, R.ID_salle, R.date, S.Type, E.nom, E.prenom, E.login FROM reservation R, salle S, enseignant E
WHERE E.login='$log' and R.ID_salle=S.ID_salle";

$res2=$pdo->prepare($req2);
$res2->execute();

$tab2=$res2->fetch();



?>
<?php 

if(isset($_GET['success'])){

    $success = $_GET['success'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Info_salle</title>
        <?php include("link.php") ?>
    </head>
    <style>

    </style>
    <body>
        <div class="container-fluid" style="margin-top:10px;">
            <a href="liens.php"class="btn btn-outline-info" style="font-size:25px;">Aller au Menu <i class="fa fa-tachometer" aria-hidden="true"></i></a>
        </div>

        <div class="container-fluid" style="margin-top:70px;">

            <?php if(isset($success)) { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong><?php echo $success ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            
               
                    <div class="jumbotron">
                       <a href="reserve.php" class="btn btn-outline-success" style="margin-left:88%;"><i class="fa fa-calendar-plus-o"></i> Réserver</a><br>
                        <h2>Table de réservation de : <span class="text-info"> <?php echo $tab2['nom']." ".$tab2['prenom']?> <i class="fa fa-user-circle"></i></span></h2><br>
                        <table class="table">
                            <thead class="bg-info text-light">
                                <th><h5>N°Réservation</h5></th>
                                <th><h5>N°Salle</h5></th>
                                <th><h5>Type de salle</h5></th>
                                <th><h5>Date réservation</h5></th>
                                <th class="text-center"><h5>OPTION</h5></th>
                             </thead>
                            <tbody>
                                <?php while($tab=$res->fetch()){ ?>
                                <tr>
                                    <td><h6><?php echo $tab['ID']?></h6></td>
                                    <td><h6><?php echo $tab['ID_salle']?></h6></td>
                                    <td><h6><?php echo $tab['Type']?></h6></td>
                                    <td><h6><?php echo $tab['date']?></h6></td>
                                    <td class="text-center"><a onclick="confirm('Etes vous sûr de vouloir annuler cette réservation ?');" href="del_res.php?id=<?php echo $tab['ID'] ?>&log=<?php echo $tab['login'] ?>" title="Supprimer" ><i class="fa fa-times text-danger"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

               

               <br>



        </div>

    </body>
</html>