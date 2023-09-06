<?php
require_once "../config.php";
require_once "../model/Seance.php" ;

class SeanceC
{
    function afficherSeance()
    {   $pdo=config::getConnexion();
        try 
        {
            $query = $pdo->prepare('select * from seance');
            $query->execute();
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function afficherseancerecherche(string $nom)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare("select * from seance where nomS like :nom");
            $query->execute(['nom' => "%$nom%"]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exeption $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
     
    function ajouterSeance(Seance $seance)
    {
        
        $pdo = config::getConnexion();
        try 
        {

            $query = $pdo->prepare('insert into seance (nomS, descriptionS, dateS, nbParticipantS, imageS, codeS) values (:nomS, :descriptionS, :dateS, :nbParticipantS, :imageS, :codeS)');
            $query->execute([
                'nomS' => $seance->getNomS(),
                'descriptionS' => $seance->getDescriptionS(),
                'dateS' => $seance->getDateS(),
                'nbParticipantS' => $seance->getNbParticipantS(),
                'imageS' => $seance->getImageS(),
                'codeS' => $seance->getCodeS()])
            ;
            
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
        
    }

    function supprimerSeance(int $ids)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from seance where idS = :ids');
            $query->execute(['ids' => $ids]);
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }

    function getSeance(int $ids)
        {   
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('SELECT * FROM seance where idS = :ids');

            $query->execute(['ids'=>$ids]);
            $result = $query->fetch();
            return $result ;
            }
            catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }  
        }
       
    function modifierSeance(Seance $seance , int $ids)
        {
        
            $pdo = config::getConnexion();
            try {

            $query = $pdo->prepare('UPDATE seance SET
            nomS = :nomS,
            descriptionS = :descriptionS,
            dateS = :dateS,
            nbParticipantS = :nbParticipantS,
            imageS = :imageS,
            codeS = :codeS
            WHERE idS = :ids ');

            $query->execute([
            'nomS' => $seance->getNomS(),
            'descriptionS' => $seance->getDescriptionS(),
            'dateS' => $seance->getDateS(),
            'nbParticipantS' => $seance->getNbParticipantS(),
            'imageS' => $seance->getImageS(),
            'codeS' => $seance->getCodeS(),
            'ids' => $ids]);
             }
             catch(Exeption $e)
            {
            die('Erreur: '.$e->getMessage());
            }
        
        }

      

}
?>