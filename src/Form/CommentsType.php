<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('userId')
            // ->add('formulaId')
            ->add('overallRating', ChoiceType::class, [
                'choices' => [
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ]
            ])
            ->add('comment')
            // ->add('feedback')
            // ->add('Jumanji', ChoiceType::class, [
            //     'choices' => [
            //         'NA' => 'NA',
            //         '0' => '0',
            //         '1' => '1',
            //         '2' => '2',
            //         '3' => '3',
            //         '4' => '4',
            //         '5' => '5',
            //     ]
            // ])
            // ->add('Voodoo', ChoiceType::class, [
            //     'choices' => [
            //         'NA' => 'NA',
            //         '0' => '0',
            //         '1' => '1',
            //         '2' => '2',
            //         '3' => '3',
            //         '4' => '4',
            //         '5' => '5',
            //     ]
            // ])
            // ->add('Assassin', ChoiceType::class, [
            //     'choices' => [
            //         'NA' => 'NA',
            //         '0' => '0',
            //         '1' => '1',
            //         '2' => '2',
            //         '3' => '3',
            //         '4' => '4',
            //         '5' => '5',
            //     ]
            // ])
            // ->add('TheCabin', ChoiceType::class, [
            //     'choices' => [
            //         'NA' => 'NA',
            //         '0' => '0',
            //         '1' => '1',
            //         '2' => '2',
            //         '3' => '3',
            //         '4' => '4',
            //         '5' => '5',
            //     ]
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
