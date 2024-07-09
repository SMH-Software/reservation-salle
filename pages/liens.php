<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Liens</title>
        <?php include("link.php") ?>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <style>
        body{
            font-family: sans-serif;
        }
        
        a{
            border-radius: 20px;
            font-size: 18px;
        }

    </style>
    <body>
        
        <div class="container">
           <h1 style="margin-left: 200px;">Bienvenue sur notre Plateforme !</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <div class="content">
                            <h3>Les enseignants</h3>
                            <a href="enseignant2.php">Cliquez ici</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="icon"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></div>
                        <div class="content">
                            <h3>Enseignants Reponsable</h3>
                            <a href="enseignant_res.php">Cliquez ici</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="icon"><i class="fa fa-calendar"></i></div>
                        <div class="content">
                            <h3>Info salle</h3>
                            <a href="info_salle.php">Cliquez ici</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="icon"><i class="fa fa-calendar-plus-o"></i></div>
                        <div class="content">
                            <h3>Reserver</h3>
                            <a href="reserve.php">Cliquez ici</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <div class="icon"><i class="fa fa-sign-out"></i></div>
                        <div class="content">
                            <h3>Se Déconnecter</h3>
                            <a href="log-out.php" onClick="return confirm('Etes vous sûr de vouloire vous déconnecter?');" >Déconnexion</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>



        <!--
<div class="container col-md-8" style="margin-top:80px;">
<div class="row">
<div class="col-md-3 jumbotron">
<a href="enseignant.php" class="btn btn-outline-primary btn-block">Liste des enseignants</a><br>
</div>
<div class="col-md-3">
<a href="enseignant_res.php" class="btn btn-outline-info btn-block">Enseignants Reponsable</a><br>
</div>
<div class="col-md-3">
<a href="info_salle.php" class="btn btn-outline-dark btn-block">Info salle</a><br>
</div>
<div class="col-md-3">
<a href="info_enseignant.php" class="btn btn-outline-success btn-block">Reservations</a> 
</div>
</div>




<a href="log-out.php" class="btn btn-danger btn-block">Se Déconnecter</a>
</div>
-->
    </body>
</html>