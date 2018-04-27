<?php

namespace App\Form;

use App\Entity\Brasserie;
use App\Entity\PaysFabrication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BrasserieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomBrasserie')
            ->add('paysFabrication', EntityType::class, array(
			'required'   => true,
			'label' => 'Pays de fabrication :',
   			'class' => PaysFabrication::class,
			'choice_label' => 'nom_pays'
			))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Brasserie::class,
        ]);
    }
}
