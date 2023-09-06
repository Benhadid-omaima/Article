<?php
require_once '../controller/reservationc.php';
$id=$_GET["id"];
$resc=new Reservationc();
$res=$resc->supprimerreservation($id);
header("Location: ../view/affichermesreservation.php");
?>