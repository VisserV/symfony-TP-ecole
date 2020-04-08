<?php

namespace App\Form\Type;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('streetNumber', TextType::class, [
                'label' => 'Numéro de rue',
                'attr' => [
                    'placeholder' => 'ex: 26 Bis'
                ]
            ])
            ->add('streetName', TextType::class, [
                'label' => 'Nom de rue',
                'attr' => [
                    'placeholder' => 'ex: allée des fleurs'
                ]
            ])
            ->add('additional1', TextType::class, [
                'label' => 'Complément 1',
                'required' => false,
                'attr' => [
                    'placeholder' => 'ex: batiment C'
                ]
            ])
            ->add('additional2', TextType::class, [
                'label' => 'Complément 2',
                'required' => false,
                'attr' => [
                    'placeholder' => 'ex: appartement C124'
                ]
            ])
            ->add('postalCode', TextType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'ex: 01000'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'ex: Bourg-en-Bresse'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
