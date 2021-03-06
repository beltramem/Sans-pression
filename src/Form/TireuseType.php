<?php

namespace App\Form;

use App\Entity\Tireuse;
use App\Entity\Biere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TireuseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('Biere', EntityType::class, array(
			'required'   => true,
			'label' => 'Biere :',
   			'class' => Biere::class,
			'choice_label' => 'NomProduit'
			))
			->add('DisponibleHappyHourTireuse', ChoiceType::class, array(
			'choices' => array(
				'Disponible' => '1',
				'Indisponible' => '0'
			),
			'expanded' => true,
			'required' => true
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tireuse::class,
        ]);
    }
}
