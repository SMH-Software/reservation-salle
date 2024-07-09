<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>

<?php 

require_once("con1.php");

$id = isset($_POST['login']) ? $_POST['login']: null;

$nom = isset($_POST['nom']) ? $_POST['nom']: null;
$prenom = isset($_POST['prenom']) ? $_POST['prenom']: null;
$nbheure = isset($_POST['nbheure']) ? $_POST['nbheure']: null;
$mdp = isset($_POST['mdp']) ? $_POST['mdp']: null;


$req1="SELECT * FROM enseignant WHERE login='$id'";
$res1=$pdo->prepare($req1);
$res1->execute();


if($user=$res1->fetch())
{
    header("location:ajout.php?existuser=1");
}else
{
    if(strlen($id) > 5)
    {
        header("location:ajout.php?lengthcaract=1");
    }else{
        $req="INSERT INTO `enseignant`(`login`, `mot_de_passe`, `nom`, `prenom`, `nbHeure`) VALUES (?,?,?,?,?)";
        $params=array($id,$mdp,$nom,$prenom,$nbheure);
        $res=$pdo->prepare($req);
        $res->execute($params);

        header('location:enseignant2.php?message=1');
    }


}



?>