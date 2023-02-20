<?php

namespace App\Form\Admin;

use App\Entity\InsuranceClaim;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InsuranceClaimType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices'=>[
                    'à traiter' => 'new',
                    'en cours de traitement' => 'in_process',
                    'traitée' => 'done'
                    ]
                // 'required' => TRUE,
                // 'constraints' => new NotBlank(['message' =>'Champ obligatoire']),
                // 'widget'=>'single_text',
                // 'format' => 'yyy-MM-dd',
                // 'html5'=>false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InsuranceClaim::class,
        ]);
    }
}
