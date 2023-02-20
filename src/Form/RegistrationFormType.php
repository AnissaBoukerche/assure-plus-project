<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class,[
                'label' => 'Nom',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('firstName', TextType::class,[
                'label' => 'Prénom',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('dateOfBirth', DateType::class,[
                'label' => 'Date de naissance',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                'widget'=>'single_text',
                'format' => 'yyy-MM-dd',
                'html5'=>false,
                ])
            ->add('address', TextType::class,[
                'label' => 'Adresse',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('city', TextType::class,[
                'label' => 'Ville',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('zipCode', TextType::class,[
                'label' => 'Code Postal',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('email', EmailType::class,[
                'label' => 'E-mail',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('phone', TextType::class,[
                'label' => 'Numéro de téléphone',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('RGPDConsent', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions.',
                    ]),
                ],
                'label' => 'J\'accepte le Règlement Général de la Protection des Données'
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' =>'Mot de passe'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
