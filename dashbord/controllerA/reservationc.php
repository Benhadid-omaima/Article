<?php
require_once "../config.php";
require_once "../model/reservation.php" ;

class Reservationc{

    function afficherseancesreserver(int $id)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from reservation r join seance s on r.idseance=s.idS where r.idseance=:id');
            $query->execute(['id' => $id]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function getuser(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM user where id = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function confirmerreservation(int $id )
    {
    $pdo = config::getConnexion();
    try {
        $query = $pdo->prepare('UPDATE reservation SET 
        status = 1
        WHERE idres = :id  ');

        $query->execute([
            'id' => $id]);
    }
    catch(Exception $e)
    {
        die('Erreur: '.$e->getMessage());
    }
    }
    function getreservation(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM reservation where idres = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

}
?>