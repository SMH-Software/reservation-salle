<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>
<?php 

require_once("con1.php");

$id = isset($_POST['id']) ? $_POST['id']: null;

$nom = isset($_POST['nom']) ? $_POST['nom']: null;
$prenom = isset($_POST['prenom']) ? $_POST['prenom']: null;
$nbheure = isset($_POST['nbheure']) ? $_POST['nbheure']: null;


$req="UPDATE enseignant SET nom=?, prenom=?, nbHeure=? WHERE login='$id'";
$params=array($nom,$prenom,$nbheure);
$res=$pdo->prepare($req);
$res->execute($params);

header("location:enseignant2.php?successupdate=1");





?>