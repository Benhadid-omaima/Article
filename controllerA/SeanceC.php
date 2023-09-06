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
    function getseance(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM seance where idS = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function getnbseance()
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT COUNT(*) as nb  FROM seance');

            $query->execute();
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function affciherseancepagination(int $per, int $pages)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM seance LIMIT :premier, :perpages');
            $query->bindParam(':premier', $per, PDO::PARAM_INT);
            $query->bindParam(':perpages', $pages, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>