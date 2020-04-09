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
        $address->setStreetNumber('12')
                ->setStreetName('rue de l\'école')
                ->setPostalCode('01000')
                ->setCity('Bourg-en-Bresse');
        $manager->persist($address);

        $school = new School();
        $school->setName('Nom de l\'école')
               ->setPhone('0123456789')
               ->setAddress($address)
               ->setEmail('contact@ecole.fr')
               ->setTimetable('<ul><li>Lundi : 8h00 - 12h00 et 14h00 - 17h00</li><li>Mardi : 8h00 - 12h00 et 14h00 - 17h00</li><li>Mercredi : 8h00 - 12h00</li><li>Jeudi : 8h00 - 12h00 et 14h00 - 17h00</li><li>Vendredi : 8h00 - 12h00 et 14h00 - 17h00</li></ul>');
        $manager->persist($school);

        $manager->flush();
    }
}
