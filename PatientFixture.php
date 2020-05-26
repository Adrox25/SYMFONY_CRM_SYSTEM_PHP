<?php


namespace App\DataFixtures;


use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PatientFixture extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $patient = new Patient();
        $patient->setRoles(['ROLE_USER', 'ROLE_PATIENT']);
        $patient->setEmail('pacjent@pacjent.com');
        $patient->setPassword($this->passwordEncoder->encodePassword($patient, 'password'));
        $patient->setFirstname('Adam');
        $patient->setLastName('Koszaka');
        $manager->persist($patient);
        $manager->flush();

    }

}