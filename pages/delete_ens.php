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


$req1="SELECT * FROM reservation WHERE  login='$id'";
$res1=$pdo->prepare($req1);
$res1->execute();

if($tab=$res1->fetch())
{
    header("location:enseignant2.php?errordelele=1");
}else
{
    $req="DELETE FROM `enseignant` WHERE  login='$id'";
    $res=$pdo->prepare($req);
    $res->execute();

    header("location:enseignant2.php?successdelete=1");


}







?>