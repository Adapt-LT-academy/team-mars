<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shoeproperties
 *
 * @ORM\Table(name="ShoeProperties", indexes={@ORM\Index(name="ShoeID", columns={"ShoeID"})})
 * @ORM\Entity
 */
class ShoeProperties
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Colour", type="string", length=255, nullable=true)
     */
    private $colour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Size", type="string", length=255, nullable=true)
     */
    private $size;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Price", type="string", length=255, nullable=true)
     */
    private $price;

    /**
     * @var \Shoe
     *
     * @ORM\ManyToOne(targetEntity="Shoe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ShoeID", referencedColumnName="ID")
     * })
     */
    private $shoeid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColour(): ?string
    {
        return $this->colour;
    }

    public function setColour(?string $colour): self
    {
        $this->colour = $colour;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getShoeID(): ?Shoe
    {
        return $this->shoeid;
    }

    public function setShoeID(?Shoe $shoeid): self
    {
        $this->shoeid = $shoeid;

        return $this;
    }


}
