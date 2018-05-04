<?php

namespace App\Form;

use App\Entity\Vignoble;
use App\Entity\RegionFabrication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VignobleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomVignoble')
            ->add('RegionFabrication', EntityType::class, array(
			'required'   => true,
			'label' => 'RegionFabrication :',
   			'class' => RegionFabrication::class,
			'choice_label' => 'NomRegion'
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vignoble::class,
        ]);
    }
}
