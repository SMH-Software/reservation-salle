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
            margin-left: -100px;
            font-size: 35px;
        }

        .icon:hover{
            color:  #169f16;
        }


        .box{
            font-size: 15px;
            border-radius: 20px;
        }

        .btn-btn{
            border:  #169f16 2px solid;
            font-size: 20px;
            border-radius: 50px;
            color:  #169f16;
        }

        .btn-btn:hover{
            background: #169f16;
            color: #fff;
        }

    </style>
    <body>
        <div class="container-fluid" style="margin-top:10px;">
            <a href="liens.php"class="btn btn-outline-info" style="font-size:25px;">Aller au Menu <i class="fa fa-tachometer" aria-hidden="true"></i></a>
        </div>

        <?php if(isset($_GET['existuser'])) { ?>
        <div class="exist-user"  data-existuser="<?php echo $_GET['existuser']; ?>">
        </div>
        <?php } ?>


        <?php if(isset($_GET['lengthcaract'])) { ?>
        <div class="length-caract"  data-lengthcaract="<?php echo $_GET['lengthcaract']; ?>">
        </div>
        <?php } ?>


        <div class="container col-md-4" style="margin-top:-10px;">

            <div class="jumbotron">
                <div class="icon">
                    <i class="fa fa-user-plus"></i>
                    <h1>Créez un compte</h1>
                </div><br>
                <form class="form" action="insert_user.php" method="post">
                    <input type="text" class="form-control box" name="login" placeholder="login*"  required>
                    <?php if(isset($logError)) { ?>
                    <p class="text-danger"><strong><?php echo $logError ?></strong></p> 
                    <?php } ?>
                    <br>
                    <input type="text" class="form-control box" name="nom" placeholder="nom *"  required ><br>
                    <input type="text" class="form-control box" name="prenom" placeholder="prenom *"  required ><br>
                    <input type="number" class="form-control box" name="nbheure" placeholder="Nombre d'heure *"  required ><br>
                    <input type="password" class="form-control box" name="mdp" placeholder="Mot de passe *"  required > <br>

                    <input type="submit" class="btn btn-block btn-btn"  value="Enregistrer" name="submit">
                </form>
            </div>

        </div>

        <script>
            const existuser = $('.exist-user').data('existuser');
            const lengthcaract = $('.length-caract').data('lengthcaract');

            if(existuser)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    html: "<b class='text-danger'>Cet utilisateur existe déjà !</b><br> Veuillez saisir un autre nom d'utilisateur !",

                });

            }

            if(lengthcaract)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    html: "<span class='text-danger'>Le nom d'utilisateur doit contenir au maximum 5 caractères !<span>",

                });

            }


        </script>

    </body>
</html>