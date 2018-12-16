<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShoeRepository")
 */
class Shoe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $Type;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $Color;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $Image;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return Shoe
     */
    public function setName(string $Name): self
    {
        $this->Name = $this->getDoctrine()->getRepository(shoe::class)->findItemByName();

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     * @return Shoe
     */
    public function setType(string $Type): self
    {
        $this->Type = $this->getDoctrine()->getRepository(shoe::class)->findItemByType();

        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->Color;
    }

    /**
     * @param string $Color
     * @return Shoe
     */
    public function setColor(string $Color): self
    {
        $this->Color = $this->getDoctrine()->getRepository(shoe::class)->findItemByColor();

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->Price;
    }

    /**
     * @param float $Price
     * @return Shoe
     */
    public function setPrice(float $Price): self
    {
        $this->Price =this->getDoctrine()->getRepository(shoe::class)->findItemByPrice();

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->Image;
    }

    /**
     * @param string $Image
     * @return Shoe
     */
    public function setImage(string $Image): self
    {
        $this->Image = $this->getDoctrine()->getRepository(shoe::class)->findItemByImage();

        return $this;
    }
}
