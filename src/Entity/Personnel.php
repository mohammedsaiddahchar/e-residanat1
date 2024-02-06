<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
#[Vich\Uploadable]
class Personnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'personnel', cascade: ['persist', 'remove'])]
    private ?Utilisateurs $idUser = null;



    public function __construct()
    {

    }

   
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?Utilisateurs
    {
        return $this->idUser;
    }

    public function setIdUser(?Utilisateurs $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    } 
}
