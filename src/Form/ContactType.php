<?php

namespace App\Form;



use App\Entity\ContactMessages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email', EmailType::class)
            ->add('object', ChoiceType::class, [
                'choices'  => [
                    'Location' => "location",
                    'Facturation/Paiement' => "finances",
                    'Conditions de vente' => "CGVE",
                    'Formules de jeu' => "games",
                    'Gameplay' => "gameplay",
                ],
            ])
            ->add('message', TextareaType::class)
            ->add('email_validation', CheckboxType::class, [
                'label'    => 'Recevoir un e-mail de confirmation :',
                'required' => false,
            ]);

            
    }

    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactMessages::class,
        ]);
    }
}
