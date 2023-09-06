<?php
require_once "../config.php";
require_once "../model/Article.php" ;

class ArticleC
{
    function afficherarticle()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('select * from article');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function getarticle(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM article where idS = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getnbarticle()
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT COUNT(*) as nb  FROM article');

            $query->execute();
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function affciherarticlepagination(int $per, int $pages)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM article LIMIT :premier, :perpages');
            $query->bindParam(':premier', $per, PDO::PARAM_INT);
            $query->bindParam(':perpages', $pages, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function ajouterarticle(Article $article)
    {
        
        $pdo = config::getConnexion();
        try 
        {

            $query = $pdo->prepare('insert into article (nomS, descriptionS, dateS, nbParticipantS, imageS, codeS) values (:nomS, :descriptionS, :dateS, :nbParticipantS, :imageS, :codeS)');
            $query->execute([
                'nomS' => $article->getNomS(),
                'descriptionS' => $article->getDescriptionS(),
                'dateS' => $article->getDateS(),
                'nbParticipantS' => $article->NULL,
                'imageS' => $article->getImageS(),
                'codeS' => $article->getCodeS()])
            ;
            
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
        
    }
    function supprimerArticle(int $ids)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from article where idS = :ids');
            $query->execute(['ids' => $ids]);
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
}
?>