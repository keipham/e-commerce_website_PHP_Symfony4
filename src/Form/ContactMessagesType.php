<?php

namespace App\Form;

use App\Entity\ContactMessages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ContactMessagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('object')
            ->add('message')
            ->add('date')
            ->add('emailValidation')
            ->add('AnswerToCustomer')
            ->add('status',ChoiceType::class,[
                'choices'  => [
                    'en attente' => 'en attente',
                    'répondu' => 'répondu'
                ]
        ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactMessages::class,
        ]);
    }
}
