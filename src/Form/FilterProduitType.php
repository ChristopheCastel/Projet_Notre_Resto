<?php

namespace App\Form;

use App\Entity\CategorieProduit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',EntityType::class,[
                "class"=> CategorieProduit::class,
                "choice_label"=>"titre",
                "required"=>false,
                "label"=>"catégorie",
                "expanded"=>true,
                "multiple"=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CategorieProduit::class,
        ]);
    }
}
