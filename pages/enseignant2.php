<?php 
session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php 

require_once("con1.php");

$req="SELECT * FROM enseignant order by(nom)";
$res=$pdo->prepare($req);
$res->execute();

$req1="SELECT E.login FROM `enseignant` E WHERE EXISTS (SELECT R.login FROM `reservation` R WHERE  E.login=R.login)";
$res1=$pdo->prepare($req1);
$res1->execute();

$set=$res1->fetch()





    //SELECT nom_colonne1 FROM `table1` WHERE EXISTS (SELECT nom_colonne2 FROM `table2`WHERE nom_colonne3 = 10)


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

        <div class="container col-md-10" style="margin-top:50px;">
            <?php if(isset($_GET['message'])) { ?>
            <div class="flash-data"  data-flashdata="<?php echo $_GET['message']; ?>">
            </div>
            <?php } ?>

            <?php if(isset($_GET['errordelele'])) { ?>
            <div class="error-delele"  data-errordelele="<?php echo $_GET['errordelele']; ?>">
            </div>
            <?php } ?>

            <?php if(isset($_GET['successdelete'])) { ?>
            <div class="success-delete"  data-successdelete="<?php echo $_GET['successdelete']; ?>">
            </div>
            <?php } ?>

            <?php if(isset($_GET['successupdate'])) { ?>
            <div class="success-update"  data-successupdate="<?php echo $_GET['successupdate']; ?>">
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
                <thead class="bg-info text-light">
                    <th><h4 class="text-center">Nom</h4></th>
                    <th><h4 class="text-center">Prenom</h4></th>
                    <th><h4 class="text-center">Nombre d'Heure</h4></th>
                    <th><h4 class="text-center">Options</h4></th>
                </thead>
                <tbody>
                    <?php while($ens=$res->fetch()){ ?>

                    <tr class="">
                        <td><h5><?php echo $ens['nom'] ?></h5></td>
                        <td><h5><?php echo $ens['prenom'] ?></h5></td>
                        <td><h5 class="text-center"><?php echo $ens['nbHeure'] ?></h5></td >

                        <td>
                            <h5 class="text-center">
                                <a href="update_ens.php?id=<?php  echo $ens['login'] ?>" class="text-warning" title="Modifier"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp; <a href="delete_ens.php?id=<?php  echo $ens['login'] ?>" class="text-danger" title="Supprimer"> <i class="fa fa-trash"></i></a>
                            </h5>
                        </td>

                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>


        <script>
            const flashdata = $('.flash-data').data('flashdata');
            const errordelele = $('.error-delele').data('errordelele');
            const successdelete = $('.success-delete').data('successdelete');
            const successupdate = $('.success-update').data('successupdate');

            if(flashdata)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Ajout Enseignant(e)',
                    html: "<span class='text-success'>Nouvel(le) enseignant(e) ajouté(e) avec succès</span>",

                });

            }

            if(errordelele)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Suppression impossible',
                    html: "<span class='text-danger'>Cet(e) enseignant(e) a été assigné(e) à une salle</span> ",

                });

            }

            if(successdelete)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Suppression',
                    html: "<span class='text-success'>Enseignant(e) supprimé(e) avec succès</span> ",
                });

            }

            if(successupdate)
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Modification',
                    html: "<span class='text-warning'>Enseignant(e) modifié(e) avec succès</span> ",


                });

            }
        </script>
    </body>
</html>