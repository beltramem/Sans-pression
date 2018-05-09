<?php

namespace App\Form;

use App\Entity\Vin;
use App\Entity\Couleur;
use App\Entity\Vignoble;
use App\Entity\TypeConteneur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class VinType extends AbstractType
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
            ->add('DescriptionProduit')
			->add('Annee')
			->add('Photo', FileType::class, array('label' => 'photo produit'))
            ->add('DegreeVin')
            ->add('NotePuissanceVin')
            ->add('NoteAlcoolVin')
            ->add('NoteAmertumeVin')
            ->add('Vignoble', EntityType::class, array(
			'required'   => true,
			'label' => 'Vignoble :',
   			'class' => Vignoble::class,
			'choice_label' => 'NomVignoble'
			))            
			->add('Couleur', EntityType::class, array(
			'required'   => true,
			'label' => 'Couleur :',
   			'class' => Couleur::class,
			'choice_label' => 'nomCouleur'
			))
			->add('typeConteneurs', EntityType::class, array(
			'required'   => true,
			'label' => 'Type conteneur :',
   			'class' => TypeConteneur::class,
			'multiple' => true,
            'expanded' => true
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vin::class,
        ]);
    }
}
