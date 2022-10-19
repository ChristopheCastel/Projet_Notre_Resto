<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [ 
                "required" => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre Nom',
                    ]),
                ]])

            ->add('prenom', TextType::class, [
                "required" => false, 
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre Prénom',
                    ]),
                ]])

            ->add('email', EmailType::class, [
                "required" => false, 
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner votre email',
                    ]),
                ]])

            ->add('telephone', TelType::class, [
                "required" => false, 
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un numéro de téléphone',
                    ]),
                ]])

            ->add('codepostal', TextType::class, [
                "label" => "Code postal",
                "required" => false, 
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un code postal',
                    ]),
                ]])

            ->add('ville', TextType::class, [
                "required" => false, 
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner une ville',
                    ]),
                ]])
            ->add('message', TextareaType::class, [
                "required" => false, 
                "label" => "Votre message",
                "attr" => [
                    "rows" => 8
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de renseigner un message',
                    ]),
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
