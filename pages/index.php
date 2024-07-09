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
            border-radius: 50px;
            color:  #168a9f;
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


        <div class="container col-md-4" style="margin-top:60px;">

            <?php if(isset($_GET['errorlogin'])) { ?>
            <div class="error-login"  data-errorlogin="<?php echo $_GET['errorlogin']; ?>">
            </div>
            <?php } ?>

            <div class="jumbotron">
                <div class="icon">
                    <i class="fa fa-user-circle"></i>
                    <h1>Connexion</h1>
                </div><br>
                <form class="form" action="login.php" method="post">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control box" name="username" id="inlineFormInputGroup" placeholder="Nom d'utilisateur *" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                        </div>
                        <input type="password" class="form-control box" name="password" id="inlineFormInputGroup" placeholder="Mot de passe *" required>
                    </div><br>
                    <input type="submit" class="btn btn-block btn-btn"  value="Se connecter">
                </form>
                <hr>
                <h6 class="text-center">Vous n'avez pas de compte ?<a href="#"><b> S'inscrire</b></a></h6>
            </div>

        </div>

        <script>
            const errorlogin = $('.error-login').data('errorlogin');

            if(errorlogin)
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Connexion impossible !',
                    html: "<b class='text-danger'>Nom d'utilisateur ou Mot de passe incorrecte !",
                });

            }
        </script>

    </body>
</html>