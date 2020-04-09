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
        $user->setFirstName('Bruno')
            ->setName('Tellez')
            ->setEmail('bruno@ecole.fr')
            ->setPhone('0133557799')
            ->setAddress($address)
            ->setRole('teacher')
            ->setPassword('$argon2id$v=19$m=65536,t=4,p=1$VDVURUZ2NUx2WU1WVjRpMg$WUMnnqETM3GlWTfJ+jzqYvJ2AFKCdAklQny9Ozx8Uak'); // "teacher"
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