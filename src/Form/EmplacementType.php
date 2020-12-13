<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Extension\core\type\TextType;
use Symfony\Component\Extension\core\type\TextareaType;
use Symfony\Component\Extension\core\type\DateTymeType;
use Symfony\Component\Extension\core\type\IntegerType;

class EmplacementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('matricule',TextType::class)
            ->add('marque',TextType::class)
            ->add('couleur',TextType::class)
            ->add('carburant',TextType::class)
            ->add('description',TextareaType::class)
            ->add('datemiseencirculation',DateTimeType::class)
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
