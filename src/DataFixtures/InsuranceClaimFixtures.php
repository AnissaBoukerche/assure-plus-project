<?php

namespace App\DataFixtures;

use App\Entity\InsuranceClaim;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class InsuranceClaimFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

    for ($i = 0; $i < 10;$i++){
        $insuranceClaim = new InsuranceClaim();

        $insuranceClaim
            ->setDateOfTheLoss($faker->dateTime())
            ->setNatureOfTheClaim($faker->text())
            ->setNatureOfTheDamages($faker->text())
            ->setPlace($faker->address())
            ->setContractNumber($faker->randomNumber(6))
            ->setVehicleModel($faker->text())
            ->setVehicleRegistrationNumber($faker->randomNumber(6))
            ->setVehicleLocation($faker->address());
        $manager->persist($insuranceClaim);
    }
        $manager->flush();
    }
}
