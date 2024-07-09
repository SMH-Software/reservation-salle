<?php 

session_start();
if(!(isset($_SESSION['PROFILE'])))
{

    header("location:index.php");		 
}

?>

<?php 

require_once("con1.php");

$date = isset($_POST['date']) ? $_POST['date']: "";
$salle = isset($_POST['idSalle']) ? $_POST['idSalle']: null;
$logEn = isset($_POST['logEns']) ? $_POST['logEns']: null;


//$now = strtotime(date('d/m/Y'));


$req1="SELECT * FROM reservation WHERE ID_salle='$salle' AND date='$date'";
$res1=$pdo->prepare($req1);
$res1->execute();


if($exit=$res1->fetch())
{
    header("location:reserve.php?errordate=1");

}else
{
    $req="INSERT INTO reservation(date, ID_salle, login) VALUES (?,?,?)";
    $params=array($date,$salle,$logEn);
    $res=$pdo->prepare($req);
    $res->execute($params);

    
    header('location:info_salle.php?addreserve=1');
}

?>