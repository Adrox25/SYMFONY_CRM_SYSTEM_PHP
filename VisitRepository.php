<?php


namespace App\Repository;

use App\Entity\User;
use App\Entity\Patient;
use App\Entity\Visit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

class VisitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visit::class);
    }
    public function findByPatient(Patient $patient)
    {
        return $this->findBy([

        'patient' => $patient
        ]);

    }
}


