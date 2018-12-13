<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConnexionsRepository")
 */
class Connexions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\utilisateurs", inversedBy="connexions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $token;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start;

    /**
     * @ORM\Column(type="datetime")
     */
    private $last_action;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $ip_origin;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $browser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?utilisateurs
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?utilisateurs $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getLastAction(): ?\DateTimeInterface
    {
        return $this->last_action;
    }

    public function setLastAction(\DateTimeInterface $last_action): self
    {
        $this->last_action = $last_action;

        return $this;
    }

    public function getIpOrigin(): ?string
    {
        return $this->ip_origin;
    }

    public function setIpOrigin(string $ip_origin): self
    {
        $this->ip_origin = $ip_origin;

        return $this;
    }

    public function getBrowser(): ?string
    {
        return $this->browser;
    }

    public function setBrowser(string $browser): self
    {
        $this->browser = $browser;

        return $this;
    }
}
