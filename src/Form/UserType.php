<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Utilisateur'   => 'ROLE_USER',
                    'Admin'         => 'ROLE_ADMIN',
                    'Parent'        => 'ROLE_PARENT',
                    'Professeur'    => 'ROLE_TEACHER'
                ],

                'multiple' => true,
                'expanded' => true,
            ])
            ->add('password', PasswordType::class)
            ->add('name')
            ->add('firstName')
            ->add('phone')
            ->add('address', AddressType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}