<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php

require_once("con1.php");

$id = isset($_GET['id']) ? $_GET['id']: null;

$req="SELECT * from enseignant WHERE login='$id'";
$res=$pdo->prepare($req);
$res->execute();

$ens=$res->fetch();

$login = $ens['login'];
$nom = $ens['nom'];
$prenom = $ens['prenom'];
$nbHeure = $ens['nbHeure'];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php include("link.php") ?>
    </head>
    <style>
        body{
            font-family: sans-serif;
        }

        .icon{
            margin-left: 200px; 
            font-size: 60px;
        }

        h1{
            margin-left: -80px;
            font-size: 35px;
        }

        .icon:hover{
            color: #c79409;
        }


        .box{
            font-size: 15px;
            border-radius: 20px;
        }

        .btn-btn{
            border:  #c79409 2px solid;
            font-size: 20px;
            border-radius: 50px;
            color:  #c79409;
        }

        .btn-btn:hover{
            background: #c79409;
            color: #fff;
        }

    </style>
    <body>
        <div class="container-fluid" style="margin-top:10px;">
            <a href="liens.php"class="btn btn-outline-info" style="font-size:25px;">Aller au Menu <i class="fa fa-tachometer" aria-hidden="true"></i></a>
        </div>

        <div class="container col-md-4 jumbotron" style="margin-top:-10px;">
            <div class="icon">
                <i class="fa fa-pencil-square-o"></i>
                <h1>Modification</h1>
            </div><br>
            <form class="form" action="update.php" method="post">
                <input type="text" class="form-control box" name="nom" placeholder="Nom *"  value="<?php echo $nom ?>" required><br>
                <input type="text" class="form-control box" name="prenom" placeholder="Prenom *"  required value="<?php echo $prenom ?>"><br>
                <input type="text" class="form-control box" name="nbheure" placeholder="Nombre d'heure *"  required value="<?php echo $nbHeure ?>"><br>
                <input type="text" class="form-control box" name="id" placeholder="Nombre d'heure *"  required value="<?php echo $login ?>" hidden>

                <input type="submit" class="btn btn-block btn-btn"  value="Modifier">
            </form>
        </div>

    </body>
</html>