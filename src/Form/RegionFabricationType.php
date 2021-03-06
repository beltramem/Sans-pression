<?php

namespace App\Form;

use App\Entity\RegionFabrication;
use App\Entity\PaysFabrication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegionFabricationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomRegion')
            ->add('PaysFabrication', EntityType::class, array(
			'required'   => true,
			'label' => 'PaysFabrication :',
   			'class' => PaysFabrication::class,
			'choice_label' => 'NomPays'
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegionFabrication::class,
        ]);
    }
}
