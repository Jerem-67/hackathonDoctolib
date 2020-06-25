<?php

namespace App\Form;

use App\Entity\Child;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;

class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('first_name')
            ->add('birthday', DateType::class, ['widget' => 'single_text',])
            ->add('sex', ChoiceType::class, [
                'label' => false,
                'expanded' => true,
                'choices' => [
                    'Girl' => true,
                    'Boy' => false,
                ]
            ])
            ->add('tuberculose', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('dtp', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('coqueluche', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('meningites', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('hepatiteB', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('ror', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('hpv', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}
