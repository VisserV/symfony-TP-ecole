<?php


namespace App\Form\Type;


use App\Entity\Child;
use App\Entity\CorrespondenceBookNote;
use App\Entity\SchoolClass;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CorrespondenceBookNoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /**
         * @var $user User
         */
        $user = $options['data']->getWritter();
        $children = [];
        /**
         * @var $class SchoolClass
         */
        foreach ($user->getSchoolClasses() as $class) {
            /**
             * @var $child Child
             */
            foreach ($class->getChildren() as $child) {
                array_push($children, $child);
            }
        }
        $builder
            ->add('children', EntityType::class, [
                'label' => 'Enfant(s)',
                'class' => Child::class,
                'choices' => $children,
                'multiple' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Texte',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CorrespondenceBookNote::class,
        ]);
    }
}