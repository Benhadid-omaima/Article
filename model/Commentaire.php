<?php
class Commentaire{

    private ?int $idres = null;
    private ?int $nbparticipant = null;
    private ?int $status = null;
    private ?string $remarque=null;
    private ?int $idarticle=null;
    private ?int $iduser=null;

    public function __construct(?int $nbparticipant, ?int $status, ?string $remarque, ?int $idarticle, ?int $iduser)
    {
        $this->nbparticipant = $nbparticipant;
        $this->status = $status;
        $this->remarque = $remarque;
        $this->idarticle = $idarticle;
        $this->iduser = $iduser;
    }

    public function getIdres(): ?int
    {
        return $this->idres;
    }

    public function setIdres(?int $idres): void
    {
        $this->idres = $idres;
    }

    public function getNbparticipant(): ?int
    {
        return $this->nbparticipant;
    }

    public function setNbparticipant(?int $nbparticipant): void
    {
        $this->nbparticipant = $nbparticipant;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    public function getRemarque(): ?string
    {
        return $this->remarque;
    }

    public function setRemarque(?string $remarque): void
    {
        $this->remarque = $remarque;
    }

    public function getIdarticle(): ?int
    {
        return $this->idarticle;
    }

    public function setidarticle(?int $idarticle): void
    {
        $this->idarticle = $idarticle;
    }

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function setIduser(?int $iduser): void
    {
        $this->iduser = $iduser;
    }


}
?>
