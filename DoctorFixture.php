<?php


namespace App\DataFixtures;

use App\Entity\Doctor;
use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DoctorFixture extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $patient = new Doctor();
        $patient->setRoles(['ROLE_USER', 'ROLE_DOCTOR']);
        $patient->setEmail('doctor@doctor.com');
        $patient->setPassword($this->passwordEncoder->encodePassword($patient, 'password'));
        $patient->setFirstname('Marta');
        $patient->setLastName('Sadowska');
        $manager->persist($patient);
        $manager->flush();

    }

}
