<?php

namespace App\Tests;

use App\Entity\InsuranceClaim;
use DateTime;
use PHPUnit\Framework\TestCase;

class InsuranceClaimUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $insuranceClaim = new InsuranceClaim();
        $dateOfTheLoss = new DateTime();

        $insuranceClaim->setdateOfTheLoss($dateOfTheLoss)
            ->setPlace('lieu')
            ->setNatureOfTheClaim('circonstances')
            ->setNatureOfTheDamages('dégâts')
            ->setContractNumber('1234567891')
            ->setVehicleModel('Marseille')
            ->setVehicleRegistrationNumber('12345')
            ->setVehicleLocation('1234567891');
        $this->assertTrue($insuranceClaim->getDateOfTheLoss() === $dateOfTheLoss);
        $this->assertTrue($insuranceClaim->getPlace() === 'lieu');
        $this->assertTrue($insuranceClaim->getNatureOfTheClaim() === 'circonstances');
        $this->assertTrue($insuranceClaim->getNatureOfTheDamages() === 'dégâts');
        $this->assertTrue($insuranceClaim->getContractNumber() === '1234567891');
        $this->assertTrue($insuranceClaim->getVehicleModel() === 'Marseille');
        $this->assertTrue($insuranceClaim->getVehicleRegistrationNumber() === '12345');
        $this->assertTrue($insuranceClaim->getVehicleLocation() === '1234567891');
    }
    public function testIsFalse()
    {
        $insuranceClaim = new InsuranceClaim();
        $dateOfTheLoss = new DateTime();


        $insuranceClaim->setdateOfTheLoss($dateOfTheLoss)
            ->setPlace('lieu')
            ->setNatureOfTheClaim('circonstances')
            ->setNatureOfTheDamages('dégâts')
            ->setContractNumber('1234567891')
            ->setVehicleModel('Marseille')
            ->setVehicleRegistrationNumber('12345')
            ->setVehicleLocation('1234567891');
        $this->assertFalse($insuranceClaim->getDateOfTheLoss() === 'false');
        $this->assertFalse($insuranceClaim->getPlace() === 'false');
        $this->assertFalse($insuranceClaim->getNatureOfTheClaim() === new DateTime());
        $this->assertFalse($insuranceClaim->getNatureOfTheDamages() === 'false@studi.fr');
        $this->assertFalse($insuranceClaim->getContractNumber() === 'false');
        $this->assertFalse($insuranceClaim->getVehicleModel() === 'false');
        $this->assertFalse($insuranceClaim->getVehicleRegistrationNumber() === 'false');
        $this->assertFalse($insuranceClaim->getVehicleLocation() === 'false');
    }

public function testIsEmpty()
    {
        $insuranceClaim = new insuranceClaim();

        $this->assertEmpty($insuranceClaim->getPlace());
        $this->assertEmpty($insuranceClaim->getNatureOfTheClaim());
        $this->assertEmpty($insuranceClaim->getNatureOfTheDamages());
        $this->assertEmpty($insuranceClaim->getContractNumber());
        $this->assertEmpty($insuranceClaim->getVehicleModel());
        $this->assertEmpty($insuranceClaim->getVehicleRegistrationNumber());
        $this->assertEmpty($insuranceClaim->getVehicleLocation());
    }
}

