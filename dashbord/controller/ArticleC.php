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
    function afficherarticlerecherche(string $nom)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare("select * from article where nomS like :nom");
            $query->execute(['nom' => "%$nom%"]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
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

    function supprimerarticle(int $ids)
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

    function getarticle(int $ids)
        {   
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('SELECT * FROM article where idS = :ids');

            $query->execute(['ids'=>$ids]);
            $result = $query->fetch();
            return $result ;
            }
            catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }  
        }
       
    function modifierarticle(Article $article , int $ids)
        {
        
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('UPDATE article SET
            nomS = :nomS,
            descriptionS = :descriptionS,
            dateS = :dateS,
            nbParticipantS = :nbParticipantS,
            imageS = :imageS,
            codeS = :codeS
            WHERE idS = :ids ');

            $query->execute([
            'nomS' => $article->getNomS(),
            'descriptionS' => $article->getDescriptionS(),
            'dateS' => $article->getDateS(),
            'nbParticipantS' => $article->NULL,
            'imageS' => $article->getImageS(),
            'codeS' => $article->getCodeS(),
            'ids' => $ids]);
             }
             catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }
        
        }

      

}
?>