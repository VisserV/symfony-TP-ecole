<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\School;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SchoolFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $address = new Address();
        $address->setStreetNumber('12');
        $address->setStreetName('rue de l\'école');
        $address->setPostalCode('01000');
        $address->setCity('Bourg-en-Bresse');

        $manager->persist($address);

        $school = new School();
        $school->setName('Nom de l\'école');
        $school->setPhone('0123456789');
        $school->setAddress($address);
        $school->setEmail('contact@ecole.fr');
        $school->setTimetable('Du lundi au vendredi (8h30 - 17h)');

        $manager->persist($school);

        $manager->flush();
    }
}
