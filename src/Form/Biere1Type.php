<?php

namespace App\Form;

use App\Entity\Biere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class Biere1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomProduit')
            ->add('DisponibiliteProduit')
            ->add('Photo', FileType::class, array('label' => 'photo produit'))
            ->add('DescriptionProduit')
            ->add('DateCreationProduit')
            ->add('AltPhoto')
            ->add('Degree_biere')
            ->add('Note_amertume_biere')
            ->add('Note_alcool_biere')
            ->add('Note_puissance_biere')
            ->add('Volume')
            ->add('type_conteneur')
            ->add('type_biere')
            ->add('brasserie')
            ->add('couleur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Biere::class,
        ]);
    }
}
