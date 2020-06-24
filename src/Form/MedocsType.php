<?php

namespace App\Form;

use App\Entity\Medocs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedocsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('posologie')
            ->add('symptome')
            ->add('effets')
            ->add('contrindic')
            ->add('dosage')
            ->add('conserv')
            ->add('forme')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medocs::class,
        ]);
    }
}
