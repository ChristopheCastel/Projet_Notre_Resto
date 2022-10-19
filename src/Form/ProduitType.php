<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\CategorieProduit;

use App\Entity\AdminCategorieMenus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class,[
                "label" => false,
                "required" => false,
               
                "attr" =>[
                    "placeholder" => "Saisir un titre au produit"
                ],
                "constraints"=>[
                    new NotBlank([
                        "message" => " saisir un titre"
                    ]),
                   

                ]

            ])
            ->add('prix', MoneyType::class,[
                "currency" => "eur",
                "label" => false,
                "required" => false,
                "attr" =>[
                    "placeholder" => "Saisir un prix"
                ],
                "constraints" =>[
                    new NotBlank([
                        "message" => "Merci de saisir un prix"
                    ])
                ]
            ])
            ->add('description', TextareaType::class,[
                "label" => false,
                
                "required" => false,
                "attr" =>[
                    "rows" => 5,
                    "placeholder" => "Saisir une desciption"
                ]
                
            ])
            






            ->add('categorieMenus', EntityType::class,[

                "class" => AdminCategorieMenus::class,
                "choice_label" => "titre",
                "placeholder" => "Saisir un menu",
                "required" => false,
                "label" =>false,
                
                
                
                
                "constraints" =>[
                    new NotBlank([
                        "message" => "Merci de saisir un menu"
                    ])
                ]

            ])
            
            ->add('categorie', EntityType::class,[

                "class" => CategorieProduit::class,
                "choice_label" => "titre",
                "placeholder" => "Saisir une catégorie",
                "required" => false,
                "label" =>false,
                "constraints" =>[
                    new NotBlank([
                        "message" => "Merci de saisir une catégorie"
                    ])
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
