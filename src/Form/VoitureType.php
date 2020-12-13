<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Matricule')
            ->add('Marque')
            ->add('Couleur')
            ->add('TypeDeCarburant')
            ->add('Description')
            ->add('DateDeMiseEnCirculation')
            ->add('Disponibilitee')
            ->add('NombreDePlace')
            ->add('emplacement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
