<?php

require_once('con1.php');

$req="SELECT E.login FROM `enseignant` E WHERE EXISTS (SELECT R.login FROM `reservation` R WHERE  E.login=R.login)";
$res=$pdo->prepare($req);
$res->execute();

// $array = [
//    "foo" => "bar",
//    "bar" => "foo",
//];
// 
while($set=$res->fetch()){
    echo $set['login']. "<br>";
}