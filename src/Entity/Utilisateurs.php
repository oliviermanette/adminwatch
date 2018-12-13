<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateursRepository")
 */
class Utilisateurs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $pass;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $hardtoken;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $pays;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\societes", inversedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Connexions", mappedBy="utilisateur", orphanRemoval=true)
     */
    private $connexions;

    public function __construct()
    {
        $this->connexions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getHardtoken(): ?string
    {
        return $this->hardtoken;
    }

    public function setHardtoken(string $hardtoken): self
    {
        $this->hardtoken = $hardtoken;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getSociete(): ?societes
    {
        return $this->societe;
    }

    public function setSociete(?societes $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * @return Collection|Connexions[]
     */
    public function getConnexions(): Collection
    {
        return $this->connexions;
    }

    public function addConnexion(Connexions $connexion): self
    {
        if (!$this->connexions->contains($connexion)) {
            $this->connexions[] = $connexion;
            $connexion->setUtilisateur($this);
        }

        return $this;
    }

    public function removeConnexion(Connexions $connexion): self
    {
        if ($this->connexions->contains($connexion)) {
            $this->connexions->removeElement($connexion);
            // set the owning side to null (unless already changed)
            if ($connexion->getUtilisateur() === $this) {
                $connexion->setUtilisateur(null);
            }
        }

        return $this;
    }
}
