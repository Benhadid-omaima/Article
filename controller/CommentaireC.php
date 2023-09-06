<?php
require_once "../config.php";
require_once "../model/Commentaire.php" ;

class CommentaireC{

    function afficherarticlesreserver(int $id)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from commentaire r join article s on r.idarticle=s.idS where r.idarticle=:id');
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
    function confirmercommentaire(int $id )
    {
    $pdo = config::getConnexion();
    try {
        $query = $pdo->prepare('UPDATE commentaire SET 
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
    function getcommentaire(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM commentaire where idres = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajoutercommentaire(Commentaire $commentaire)
    {

        $pdo = config::getConnexion();
        try
        {

            $query = $pdo->prepare('insert into commentaire (nbparticipant,status,remarque,idarticle,iduser) values (:nbparticipant,:status,:remarque,:idarticle,:iduser)');
            $query->execute(['nbparticipant' => $commentaire->NULL,
                'status'=>$commentaire->getStatus(),
                'remarque'=>$commentaire->getRemarque(),
                'idarticle'=>$commentaire->getIdarticle(),
                'iduser'=>$commentaire->getIduser()
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }

    function affichermescommentaire(int $id)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from commentaire where iduser=:id');
            $query->execute(['id' => $id]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function supprimercommentaire(int $idres)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from commentaire where idres=:idres');
            $query->execute(['idres' => $idres]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function modifiercommentaire(commentaire $commentaire,int $id )
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('UPDATE commentaire SET 
        nbparticipant = :nbparticipant, 
        remarque = :remarque
        WHERE idres = :id  ');

            $query->execute(['nbparticipant' => $commentaire->getNbparticipant(),
                'remarque' => $commentaire->getRemarque(),
                'id' => $id]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }

}
?>