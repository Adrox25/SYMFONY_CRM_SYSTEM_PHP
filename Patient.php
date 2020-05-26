<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

/** Class Patient
 *package App\Entity
 *@ORM\Entity()
 */
class Patient extends User
{
/**
 * @ORM\Column(type="string")
 * @var string
 */
private $firstname;
/**
 * @ORM\Column(type="string")
 * @var String
 */
private $lastName;

    /**
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return String
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param String $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
    public function __toString(): string {
        return $this->firstname. ' ' . $this->lastName;
    }

}