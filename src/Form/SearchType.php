<?php

namespace App\Form;

use App\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('searchEmail', TextType::class, [
                'required' => false,
                'attr' => ['placeholder' => 'entrer un email à rechercher'],
            ])

            ->add('searchTitre', TextType::class, [ 
                'required' => false, 'attr' => ['placeholder' => 'Cherchez par titres'],
            ])

            ->add('searchCategorie', TextType::class, [ 
                'required' => false, 'attr' => ['placeholder' => 'Cherchez par catégories'],
            ])

            ->add('searchPrix', TextType::class, [ 
                'required' => false, 'attr' => ['placeholder' => 'Cherchez par prix'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method'     => 'get',
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
