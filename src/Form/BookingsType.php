<?php

namespace App\Form;

use App\Entity\Bookings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BookingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('customerId')
            // ->add('status')
            // ->add('beginAt')
            // ->add('endAt')
            ->add('formulaName', ChoiceType::class, [
                'choices' => [
                    'Basique' => 'Basique',
                    'Duo' => 'Duo',
                    'Trio' => 'Trio',
                    'La totale' => 'La Totale',
                ]
            ])
            ->add('gamesName', ChoiceType::class, [
                'choices' => [
                    'Basique' => [
                        'Jumanji' => 'Jumanji',
                        'Voodoo' => 'Duo',
                        'Assassin' => 'Trio',
                        'The Cabin' => 'The Cabin'
                    ],
                    'Duo' => [
                        'Jumanji & Voodoo' => 'Jumanji & Voodoo',
                        'Jumanji & Assassin' => 'Jumanji & Assassin',
                        'Jumanji & The Cabin' => 'Jumanji & The Cabin',
                        'Voodoo & Assassin' => 'Voodoo & Assassin',
                        'Voodoo & The Cabin' => 'Voodoo & The Cabin',
                        'Assassin & The Cabin' => 'Assassin & The Cabin'
                    ],
                    'Trio' => [
                        'Jumanji & Voodoo & Assassin' => 'Jumanji & Voodoo & Assassin',
                        'Jumanji & Voodoo & The Cabin' => 'Jumanji & Voodoo & The Cabin',
                        'Jumanji & Assassin & The Cabin' => 'Jumanji & Assassin & The Cabin',
                        'Voodoo & Assassin & The Cabin' => 'Voodoo & Assassin & The Cabin',
                    ],
                    'La Totale' => [
                        'Jumanji & Voodoo & Assassin & The Cabin' => 'Jumanji & Voodoo & Assassin & The Cabin'
                    ]
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bookings::class,
        ]);
    }
}
