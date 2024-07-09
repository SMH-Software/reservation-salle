<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php 
require_once("con1.php");

$motCle = isset($_GET['id_salle']) ? $_GET['id_salle']: null;

$req="SELECT R.ID, R.ID_Salle, R.date, S.Type, E.nom, E.prenom, E.login FROM reservation R, salle S, enseignant E
WHERE (R.login=E.login and R.ID_salle=S.ID_Salle) and R.ID_Salle like '%$motCle%'";

$res=$pdo->prepare($req);
$res->execute();

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

            <?php if(isset($_GET['addreserve'])) { ?>
            <div class="add-reserve"  data-addreserve="<?php echo $_GET['addreserve']; ?>">
            </div>
            <?php } ?>

            <?php if(isset($_GET['successdelete'])) { ?>
            <div class="success-delete"  data-successdelete="<?php echo $_GET['successdelete']; ?>">
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="jumbotron">
                        <a href="reserve.php" class="btn btn-outline-success" style="margin-left:88%;"><i class="fa fa-calendar-plus-o"></i> Réserver</a><br>
                        <h2>Resultat de la recherche</h2>

                        <table class="table">
                            <thead class="bg-dark text-light">
                                <th>ID salle</th>
                                <th>Type_Salle</th>
                                <th>Date_Res</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th class="text-center">OPTION</th>
                            </thead>
                            <tbody>
                                <?php while($recherche=$res->fetch()){ ?>
                                <tr>
                                    <td><?php echo $recherche['ID_Salle']?></td>
                                    <td><?php echo $recherche['Type']?></td>
                                    <td><?php echo $recherche['date']?></td>
                                    <td><?php echo $recherche['nom']?></td>
                                    <td><?php echo $recherche['prenom']?></td>

                                    <td class="text-center"><a onclick="confirm('Etes vous sûr de vouloir annuler cette réservation ?');" href="del_res.php?id=<?php echo $recherche['ID'] ?>&log=<?php echo $recherche['login'] ?>" title="Supprimer" ><i class="fa fa-times text-danger"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="jumbotron">
                        <form class="form" action="info_salle.php" method="get">
                            <h3>Recherche </h3>
                            <input type="text" class="form-control" name="id_salle" placeholder="ID_Salle *"  required>
                            <div id="ErrorID_Salle" class="text-danger"></div><br>
                            <input type="submit" class="btn btn-success btn-block"  value="Rechercher">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const addreserve = $('.add-reserve').data('addreserve');
            const successdelete = $('.success-delete').data('successdelete');


            if(addreserve)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Ajout Réservation',
                    html: "<span class='text-success'>Nouvelle réservation ajoutée avec succès</span>",

                });

            }


            if(successdelete)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Suppression Réservation',
                    html: "<span class='text-danger'>Réservation supprimé avec succès !</span>",
                  

                });

            }

        </script>

    </body>
</html>