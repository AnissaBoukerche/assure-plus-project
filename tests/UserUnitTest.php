<?php

namespace App\Tests;

use App\Entity\User;
use DateTime;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();
        $dateOfBirth = new DateTime();

        $user->setFirstName('prénom')
            ->setLastName('nom')
            ->setDateOfBirth($dateOfBirth)
            ->setEmail('test@studi.fr')
            ->setAddress('10 avenue de Marseille')
            ->setCity('Marseille')
            ->setZipCode('13000')
            ->setPhone('1234567891')
            ->setPassword('1234567');
        $this->assertTrue($user->getFirstName() === 'prénom');
        $this->assertTrue($user->getLastName() === 'nom');
        $this->assertTrue($user->getDateOfBirth() === $dateOfBirth);
        $this->assertTrue($user->getEmail() === 'test@studi.fr');
        $this->assertTrue($user->getAddress() === '10 avenue de Marseille');
        $this->assertTrue($user->getCity() === 'Marseille');
        $this->assertTrue($user->getZipCode() === '13000');
        $this->assertTrue($user->getPhone() === '1234567891');
        $this->assertTrue($user->getPassword() === '1234567');
    }
    public function testIsFalse()
    {
        $user = new User();
        $dateOfBirth = new DateTime();


        $user->setFirstName('prénom')
            ->setLastName('nom')
            ->setDateOfBirth($dateOfBirth)
            ->setEmail('test@studi.fr')
            ->setAddress('10 avenue de Marseille')
            ->setCity('Marseille')
            ->setZipCode('13000')
            ->setPhone('1234567891')
            ->setPassword('1234567');
        $this->assertFalse($user->getFirstName() === 'false');
        $this->assertFalse($user->getLastName() === 'false');
        $this->assertFalse($user->getDateOfBirth() === new DateTime());
        $this->assertFalse($user->getEmail() === 'false@studi.fr');
        $this->assertFalse($user->getAddress() === 'false');
        $this->assertFalse($user->getCity() === 'false');
        $this->assertFalse($user->getZipCode() === 'false');
        $this->assertFalse($user->getPhone() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
    }

public function testIsEmpty()
    {
        $user = new User();

        $this->assertEmpty($user->getFirstName());
        $this->assertEmpty($user->getLastName());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getAddress());
        $this->assertEmpty($user->getCity());
        $this->assertEmpty($user->getZipCode());
        $this->assertEmpty($user->getPhone());
        $this->assertEmpty($user->getPassword());
    }
}
