<?php


namespace App\Controller;


use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends EasyAdminController
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function persistEntity($user)
    {
        $this->updatePassword($user);
        $this->checkAddress($user);
        parent::persistEntity($user);
    }

    public function updateEntity($user)
    {
        $this->updatePassword($user);
        $this->checkAddress($user);
        parent::updateEntity($user);
    }

    public function updatePassword(User $user)
    {
        if (!empty($user->getPlainPassword())) {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPlainPassword()));
        }
    }

    public function checkAddress(User $user)
    {
        $address = $user->getAddress();
        if ($address !== null && $address->getId() === null) {
//            parent::findBy(
//                'Address',
//                parent::createSearchQueryBuilder(
//                    'Address',
//
//                )
//            );
        }
    }
}