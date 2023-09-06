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

    function ajouterreservation(Reservation $reservation)
    {

        $pdo = config::getConnexion();
        try
        {

            $query = $pdo->prepare('insert into reservation (nbparticipant,status,remarque,idseance,iduser) values (:nbparticipant,:status,:remarque,:idseance,:iduser)');
            $query->execute(['nbparticipant' => $reservation->getNbparticipant(),
                'status'=>$reservation->getStatus(),
                'remarque'=>$reservation->getRemarque(),
                'idseance'=>$reservation->getIdseance(),
                'iduser'=>$reservation->getIduser()
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }

    function affichermesreservation(int $id)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from reservation where iduser=:id');
            $query->execute(['id' => $id]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function supprimerreservation(int $idres)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from reservation where idres=:idres');
            $query->execute(['idres' => $idres]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifierreservation(Reservation $reservation,int $id )
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('UPDATE reservation SET 
        nbparticipant = :nbparticipant, 
        remarque = :remarque
        WHERE idres = :id  ');

            $query->execute(['nbparticipant' => $reservation->getNbparticipant(),
                'remarque' => $reservation->getRemarque(),
                'id' => $id]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }

}
?>