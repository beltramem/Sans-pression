<?php

namespace App\Form;

use App\Entity\Alcool;
use App\Entity\TypeAlcool;
use App\Entity\CategorieVieillissement;
use App\Entity\PaysFabrication;
use App\Entity\Couleur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AlcoolType extends AbstractType
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
            ->add('DegreeAlcool')
            ->add('NotePuissanceAlcool')
            ->add('NoteAlcoolAlcool')
            ->add('NoteAmertumeAlcool')
            ->add('Volume')
			->add('TypeAlcool', EntityType::class, array(
			'required'   => true,
			'label' => 'TypeAlcool :',
   			'class' => TypeAlcool::class,
			'choice_label' => 'NomTypeAlcool'
			))
			->add('CategorieVieillissement', EntityType::class, array(
			'required'   => true,
			'label' => 'CategorieVieillissement :',
   			'class' => CategorieVieillissement::class,
			'choice_label' => 'NomCategorieVieillissement'
			))
            ->add('paysFabrication', EntityType::class, array(
			'required'   => true,
			'label' => 'Pays de fabrication :',
   			'class' => PaysFabrication::class,
			'choice_label' => 'nom_pays'
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
            'data_class' => Alcool::class,
        ]);
    }
}
