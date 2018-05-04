<?php

namespace App\Form;

use App\Entity\Divers;
use App\Entity\TypeDivers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DiversType extends AbstractType
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
            ->add('TypeDivers', EntityType::class, array(
			'required'   => true,
			'label' => 'TypeDivers :',
   			'class' => TypeDivers::class,
			'choice_label' => 'NomTypeDivers'
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Divers::class,
        ]);
    }
}
