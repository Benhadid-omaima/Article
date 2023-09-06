<?php
require_once "../controller/ArticleC.php";
require_once "../model/article.php";

if(isset($_GET["id"]))
{   
    $ids=$_GET["id"];
    $articlec=new ArticleC();
    $articlec->supprimerArticle($ids);
    header("Location: ../vieww/AfficherArticle.php");
    exit();
}
    





?>