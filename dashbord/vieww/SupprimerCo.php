<?php
require_once "../controller/CommentaireC.php";
require_once "../model/Commentaire.php";

if(isset($_GET["id"]))
{   
    $ids=$_GET["id"];
    $commentaireC=new CommentaireC();
    $commentaireC->supprimerCommentaire($ids);
    header("Location: ../vieww/AfficherArticle.php");
    exit();
}
    





?>