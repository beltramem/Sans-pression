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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomProduit')
			->add('DisponibiliteProduit', ChoiceType::class, array(
			'choices' => array(
				'En stock' => 'En stock',
				'Sur commande' => 'Sur commande',
				'Indisponible' => 'Indisponible'
			),
			'expanded' => true,
			'required' => true
			))
            ->add('Photo', FileType::class, array('label' => 'photo produit'))
            ->add('DescriptionProduit')
            ->add('Degree_biere')
            ->add('Note_amertume_biere')
            ->add('Note_alcool_biere')
            ->add('Note_puissance_biere')
            ->add('typeConteneurs', EntityType::class, array(
			'required'   => true,
			'label' => 'Type conteneur :',
   			'class' => TypeConteneur::class,
			'multiple' => true,
            'expanded' => true
			))
            ->add('typeBiere', EntityType::class, array(
			'required'   => true,
			'label' => 'Type biere :',
   			'class' => TypeBiere::class,
			'choice_label' => 'NomTypeBiere',
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
