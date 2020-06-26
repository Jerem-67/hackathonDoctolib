<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'required' => false,
            ])
            ->add('name')
            ->add('firstName')
            ->add('birthday', DateType::class, ['widget' => 'single_text',])
            ->add('sex',ChoiceType::class, [
                'expanded' => true,
                'label' => false,
                'choices' => [
                    'Mrs' => 0,
                    'Mr' => 1,
                ],
            ])
            ->add('dtp', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('coqueluche', DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('grippe',DateType::class, [
                'required'=> false,
                'widget' => 'single_text',])
            ->add('zona',DateType::class, [
                'required'=> false,
                'widget' => 'single_text',
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
