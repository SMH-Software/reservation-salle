<?php 
 
 require_once("con1.php");
 
 $id = isset($_GET['id']) ? $_GET['id']: "";
 $log = isset($_GET['log']) ? $_GET['log']: "";
 
 $req2="DELETE FROM reservation WHERE ID='$id'";
 $res2=$pdo->prepare($req2);
 $res2->execute();

 header("location:info_salle.php?successdelete=1");


