<?php

namespace App\Form;

use App\Entity\Adresses;
use App\Entity\Users;
use Doctrine\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdressesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse')
            ->add('cp')
            ->add('ville')
            ->add('idu', EntityType::class, [
                // 'mapped' => false,
                'class' => Users::class,
                'choice_label' => 'email', // Données affichées dans le menu déroulant
                'choice_value' => 'id', // Valeur présente dans value=""
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresses::class,
        ]);
    }
}
