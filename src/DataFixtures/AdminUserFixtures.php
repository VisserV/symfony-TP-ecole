<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AdminUserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $address = new Address();
        $address->setStreetNumber('12');
        $address->setStreetName('rue de l\'admin');
        $address->setPostalCode('01000');
        $address->setCity('Bourg-en-Bresse');

        $manager->persist($address);

        $user = new User();
        $user->setFirstName('Admin');
        $user->setName('Admin');
        $user->setEmail('admin@ecole.fr');
        $user->setPhone('0122446688');
        $user->setAddress($address);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$TTRZOTVDanp5VFdpU2pvNQ$KMIvzWkvec1vsYHGBdesJiJxeHCMIoSFcBzAqx3SPCU'); // "admin"
        $manager->persist($user);

        $manager->flush();
    }
}
