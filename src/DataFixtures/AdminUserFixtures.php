<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\SchoolClass;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AdminUserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $address = new Address();
        $address->setStreetNumber('12')
                ->setStreetName('rue de l\'admin')
                ->setPostalCode('01000')
                ->setCity('Bourg-en-Bresse');
        $manager->persist($address);

        $user = new User();
        $user->setFirstName('Admin')
             ->setName('Admin')
             ->setEmail('admin@ecole.fr')
             ->setPhone('0122446688')
             ->setAddress($address)
             ->setRole('admin')
             ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$TTRZOTVDanp5VFdpU2pvNQ$KMIvzWkvec1vsYHGBdesJiJxeHCMIoSFcBzAqx3SPCU'); // "admin"
        $manager->persist($user);

        $manager->flush();
    }
}
