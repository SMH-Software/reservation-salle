<?php 
  session_start();

  if(isset($_POST['submit'])){

      if(empty($_POST['login']) && empty($_POST['password'])){

          $_SESSION['vide'] = "Veuillez renseigner les tous les champs pour vous connecter";
          header("location:../index.php");
      }else{

          $login = isset($_POST['login']);
          $password = isset($_POST['password']);

          require_once("config.php");

          $connexion="SELECT * FROM comptes WHERE USERNAME='$login' AND `PASSWORD`='$password'";
          $result=$pdo->prepare($connexion);
          $result->execute();

        
          if($result->rowCount() > 0){

            $profile=$result->fetch();
            $_SESSION['PROFILE'] = $profile;
            header("location:../src/index.php");

          }
          else
          { 

            $_SESSION['error'] = "Login ou Mot de passe invalide !";
            header("location:../index.php");

          }

      }  

  }

?>

