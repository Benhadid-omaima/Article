<?php
require_once "../controller/SeanceC.php";
require_once "../model/seance.php";

if(isset($_GET["id"]))
{   
    $ids=$_GET["id"];
    $seancec=new SeanceC();
    $seancec->supprimerSeance($ids);
    header("Location: ../view/AfficherSeance.php");
    exit();
}
    





?>