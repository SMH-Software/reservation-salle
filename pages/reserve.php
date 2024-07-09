<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php 

require_once("con1.php");


$req1="SELECT * FROM salle";
$res1=$pdo->prepare($req1);
$res1->execute();


$req2="SELECT * FROM enseignant";
$res2=$pdo->prepare($req2);
$res2->execute();

?>
<?php 

if(isset($_GET['Errordate'])){

    $errordate = $_GET['Errordate'];
}else{
    $errordate = "";
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
        body{
            font-family: sans-serif;
        }

        .icon{
            margin-left: 180px; 
            font-size: 60px;
        }

        h1{
            margin-left: -70px;
        }

        .icon:hover{
            color:  #168a9f;
        }


        .box{
            font-size: 15px;
            border-radius: 20px;
        }

        .btn-btn{
            border:  #168a9f 2px solid;
            font-size: 20px;
            border-radius: 50px;
            color:  #168a9f;
        }

        .btn-btn:hover{
            background: #168a9f;
            color: #fff;
        }

    </style>
    <body>
        <div class="container-fluid" style="margin-top:10px;">
            <a href="liens.php"class="btn btn-outline-info" style="font-size:25px;">Aller au Menu <i class="fa fa-tachometer" aria-hidden="true"></i></a>
        </div> 

        <?php if(isset($_GET['errordate'])) { ?>
        <div class="error-date"  data-errordate="<?php echo $_GET['errordate']; ?>">
        </div>
        <?php } ?>

        <div class="container col-md-4" style="margin-top:-10px;">
            <div class="jumbotron">
                <div class="icon">
                    <i class="fa fa-calendar-plus-o"></i>
                    <h1>Réservation</h1>
                </div><br>
                <form class="form" action="insert_res.php" method="post">
                    <input type="date" class="form-control box" name="date" placeholder="Date réservation*"  required>
                    <br>

                    <label for=""><h5>N°Salle</h5></label>

                    <select name="idSalle" id="" class="form-control box" required>
                        <option value="" selected>Choix...</option>
                        <?php while($salle=$res1->fetch()) {?>
                        <option value="<?php echo $salle['ID_salle']?>"><?php echo $salle['ID_salle']." ".$salle['Type']?></option>
                        <?php } ?>
                    </select>

                    <?php if(isset($errordate)) { ?>
                    <p class="text-danger"><strong><?php echo $errordate ?></strong></p> 
                    <?php } ?>
                    <br>

                    <label for=""><h5>Identifiant Enseignant</h5></label>
                    <select name="logEns" id="" class="form-control box" required>
                        <option value="" selected>Choix...</option>
                        <?php while($log=$res2->fetch()) { ?>
                        <option value="<?php echo $log['login']?>"><?php echo $log['login']." ".$log['nom']." ".$log['prenom'] ?></option>
                        <?php } ?>
                    </select><br><br>

                    <input type="submit" class="btn btn-block btn-btn"  value="RESERVER" name="submit">
                </form>
            </div>
        </div>


        <script>
            const errordate = $('.error-date').data('errordate');


            if(errordate)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    html: "<span class='text-danger'>Le n° de salle saisie a été réservée à la même date !</span>",


                });

            }

        </script>

    </body>
</html>


