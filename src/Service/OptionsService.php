<?php
namespace App\Service;
use App\Entity\Size;
use Doctrine\ORM\EntityManagerInterface;

class OptionsService
{
    protected $em;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }
    /**
     * @return Size[]|array
     */
    public function getSize()
    {
        $size1 = new Size();
        $size1
            ->setId(1)
            ->setName('Supersize')
            ->setType('main');
        $size2 = new Size();
        $size2
            ->setId(2)
            ->setName('Large')
            ->setType('main');
        return [
            $size1,
            $size2
        ];

        return $this->em->getRepository(Size::class)->findAll();
    }
}