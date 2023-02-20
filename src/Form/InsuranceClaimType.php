<?php

namespace App\Form;

use App\Entity\InsuranceClaim;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class InsuranceClaimType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateOfTheLoss', DateType::class, [
                'label' => 'Date du sinistre',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                'widget'=>'single_text',
                'format' => 'yyy-MM-dd',
                'html5'=>false,
            ])
            ->add('place', TextType::class, [
                'label' => 'Lieu du sinistre',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('natureOfTheClaim', TextareaType::class,[
                'label' => 'Circonstances détaillées du sinistre',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('natureOfTheDamages', TextareaType::class,[
                'label' => 'Dégâts constatés sur le véhicule',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('contractNumber',TextType::class,[
                'label' => 'Numéro du contrat d\'assurance',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('vehicleModel',TextType::class,[
                'label' => 'Modèle du véhicule',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('vehicleRegistrationNumber',TextType::class,[
                'label' => 'Numéro d\'immatriculation du véhicule',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('vehicleLocation',TextType::class,[
                'label' => 'Lieu où se trouve le véhicule actuellement',
                'required' => TRUE,
                'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                ])
            ->add('insuranceClaimImages', CollectionType::class,[
                'entry_type' => InsuranceClaimImagesType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'label'=>false,
                'by_reference' => false,
                'disabled' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InsuranceClaim::class,
        ]);
    }
}
