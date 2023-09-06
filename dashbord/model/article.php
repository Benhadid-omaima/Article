<?php
class Article{
    private ?int $ids = null;
    private ?string $nomS = null;
    private ?string $descriptionS = null;
    private ?string $dateS = null;
    private ?int $nbParticipantS = null;
    private ?string $imageS = null;
    private ?int $codeS = null;


    function __construct(string $nomS , string $descriptionS ,  string $dateS , string $imageS, int $codeS )
    {
        $this->nomS = $nomS ;
        $this->descriptionS = $descriptionS ;
        $this->dateS = $dateS ;
       
        $this->imageS = $imageS ;
        $this->codeS = $codeS ;
    }
    function getIdS() :int
    {
        return $this->idS;
    }

    function getNomS() :string
    {
        return $this->nomS;
    }
    function  getDescriptionS() :string
    {
        return $this->descriptionS;
    }
    function  getDateS() :string
    {
        return $this->dateS;
    }

   

    function getImageS() :string
    {
        return $this->imageS;
    }

    function getCodeS() :int
    {
        return $this->codeS;
    }

    function setNomS(string $noms):void
    {
        $this->noms = $nomS ;
    }
    function setDescriptionS(string $DescriptionS):void
    {
        $this->descriptionS = $DescriptionS ;
    }
    function setDateS(string $DateS):void
    {
        $this->DateS = $DateS ;
    }
    function setNbParticipantS(int $NbParticipantS):void
    {
        $this->nbParticipantS = $NbParticipantS ;
    }
    function setImageS(string $ImageS):void
    {
        $this->imageS = $ImageS ;
    }

    function setCodeS(int $CodeS):void
    {
        $this->codeS = $CodeS ;
    }

}


?>