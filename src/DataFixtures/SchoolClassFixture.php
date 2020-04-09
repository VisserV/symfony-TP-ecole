<?php


namespace App\DataFixtures;


use App\Entity\Address;
use App\Entity\SchoolClass;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SchoolClassFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $address = new Address();
        $address->setStreetNumber('34')
            ->setStreetName('avenue des champs')
            ->setPostalCode('01000')
            ->setCity('Bourg-en-Bresse');
        $manager->persist($address);

        $user = new User();
        $user->setFirstName('Olivier')
            ->setName('Gallas')
            ->setEmail('olivier@ecole.fr')
            ->setPhone('0133557799')
            ->setAddress($address)
            ->setRole('teacher')
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$SmIveXhxTnd6eENUTlN3dg$tXOm4U7DxXGv9C6+7l0s5pzfh5NokO68ztV8Pui53z4'); // "olivier"
        $manager->persist($user);

        foreach (['Petite section', 'Moyenne section', 'Grande section'] as $className) {
            $class = new SchoolClass();
            $class->setLibelle($className)
                  ->setTeacher($user);
            $manager->persist($class);
        }

        $manager->flush();
    }
}