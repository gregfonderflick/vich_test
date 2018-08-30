<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('service', ChoiceType::class, [
                'choices' => [
                    'Pôle Médiation' => true,
                    'Pôle Technique' => false,
                    'Insertion' => null,
                ]
            ])
            ->add('name')
            ->add('from', EmailType::class, array('label' => 'Email'))
            //->add('dateOfBirth', DateTimeType::class)
            ->add('message', TextareaType::class)
            ->add('file', FileType::class, array('label' => 'Brochure (PDF file)'))
            ->add('choice', ChoiceType::class, [
                'choices' => [
                    'Une entreprise' => true,
                    "Demandeur d'emploi" => false,
                    'Autre' => true,
                ]
            ])
            ->add('submit', SubmitType::class);



    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}