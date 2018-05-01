<?php

namespace App\Form;

use App\Entity\Biere;
use App\Entity\Brasserie;
use App\Entity\TypeBiere;
use App\Entity\TypeConteneur;
use App\Entity\Couleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BiereType extends AbstractType
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
            ->add('type_conteneur', EntityType::class, array(
			'required'   => true,
			'label' => 'Type conteneur :',
   			'class' => TypeConteneur::class,
			'choice_label' => 'NomTypeConteneur'
			))
            ->add('type_biere', EntityType::class, array(
			'required'   => true,
			'label' => 'Type biere :',
   			'class' => TypeBiere::class,
			'choice_label' => 'NomTypeBiere'
			))
			->add('brasserie', EntityType::class, array(
			'required'   => true,
			'label' => 'Brasserie :',
   			'class' => Brasserie::class,
			'choice_label' => 'nomBrasserie'
			))			
			->add('couleur', EntityType::class, array(
			'required'   => true,
			'label' => 'Couleur :',
   			'class' => Couleur::class,
			'choice_label' => 'nomCouleur'
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Biere::class,
        ]);
    }
}
