<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\NotBlank;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'required' => true,
                'label' => "Adresse email de l'utilisateur",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une adresse email'
                    ]),
                ]
            ])
            ->add('roles', ChoiceType::class, [
                // 'expanded' => false, // Affiche les choix sous forme de cases à cocher
                // 'multiple' => true, // Permet de sélectionner plusieurs rôles
                'mapped' => false,
                'choices' => [
                    'Administrateur' => 'admin',
                    'Utilisateur' => 'user',
                    'Sans rôle' => 'sr',
                ],
            ])
            ->add('password', PasswordType::class, [
                'hash_property_path' => 'password',
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
