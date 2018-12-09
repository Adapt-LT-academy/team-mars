<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="SessionID", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sessionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Shoe", inversedBy="userid")
     * @ORM\JoinTable(name="likedshoe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="UserID", referencedColumnName="SessionID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ShoeID", referencedColumnName="ID")
     *   }
     * )
     */
    private $shoeid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shoeid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getSessionid(): ?string
    {
        return $this->sessionid;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Shoe[]
     */
    public function getShoeid(): Collection
    {
        return $this->shoeid;
    }

    public function addShoeid(Shoe $shoeid): self
    {
        if (!$this->shoeid->contains($shoeid)) {
            $this->shoeid[] = $shoeid;
        }

        return $this;
    }

    public function removeShoeid(Shoe $shoeid): self
    {
        if ($this->shoeid->contains($shoeid)) {
            $this->shoeid->removeElement($shoeid);
        }

        return $this;
    }

}
