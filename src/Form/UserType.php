<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('roles')
            ->add('email')
            ->add('password')
            ->add('username')
            //->add('usernameCanonical')
            //->add('emailCanonical')
            //->add('enabled')
            //->add('salt')
            //->add('lastLogin')
            //->add('confirmationToken')
            //->add('passwordRequestedAt')
            ->add('titre')
            ->add('prenom')
            ->add('nom')
            ->add('adresse')
            ->add('ville')
            ->add('codePostal')
            ->add('telephone')
            //->add('createdAt')
            //->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
