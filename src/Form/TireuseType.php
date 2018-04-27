<?php

namespace App\Form;

use App\Entity\Tireuse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TireuseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomProduit')
            ->add('DisponibiliteProduit')
            ->add('NoteProduit')
            ->add('DescriptionProduit')
            ->add('DateCreationProduit')
            ->add('AltPhoto')
            ->add('Degree_biere')
            ->add('Note_amertume_biere')
            ->add('Note_alcool_biere')
            ->add('Note_puissance_biere')
            ->add('Volume')
            ->add('Disponible_happy_hour_tireuse')
            ->add('type_conteneur')
            ->add('type_biere')
            ->add('brasserie')
            ->add('couleur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tireuse::class,
        ]);
    }
}
