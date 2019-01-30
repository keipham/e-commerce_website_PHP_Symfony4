<?php

namespace App\Form;

use App\Entity\Bookings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('customerId')
            // ->add('status')
            ->add('beginAt')
            ->add('endAt')
            ->add('formulaId')
            ->add('gamesId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bookings::class,
        ]);
    }
}
