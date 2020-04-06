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
        $school->setTimetable('<ul><li>Lundi : 8h00 - 12h00 et 14h00 - 17h00</li><li>Mardi : 8h00 - 12h00 et 14h00 - 17h00</li><li>Mercredi : 8h00 - 12h00</li><li>Jeudi : 8h00 - 12h00 et 14h00 - 17h00</li><li>Vendredi : 8h00 - 12h00 et 14h00 - 17h00</li></ul>');

        $manager->persist($school);

        $manager->flush();
    }
}
