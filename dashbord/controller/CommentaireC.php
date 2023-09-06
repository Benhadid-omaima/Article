<?php
require_once "../config.php";
require_once "../model/commentaire.php" ;

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

    function supprimerCommentaire(int $ids)
    {
        $pdo = config::getConnexion();
        try 
        {
            $query = $pdo->prepare('delete from commentaire where idres = :ids');
            $query->execute(['ids' => $ids]);
        }
        catch(Exeption $e)
        {
        die('Erreur: '.$e->getMessage());
        }
    }
}
?>