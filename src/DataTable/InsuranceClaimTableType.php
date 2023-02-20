<?php

namespace App\DataTable;

use App\Entity\InsuranceClaim;
use Doctrine\ORM\QueryBuilder;
use Umbrella\CoreBundle\DataTable\Column\DateColumnType;
use Umbrella\CoreBundle\Form\SearchType;
use Umbrella\CoreBundle\DataTable\Action\ButtonAddActionType;
use Umbrella\CoreBundle\DataTable\Column\ActionColumnType;
use Umbrella\CoreBundle\DataTable\Column\PropertyColumnType;
use Umbrella\CoreBundle\DataTable\ColumnActionBuilder;
use Umbrella\CoreBundle\DataTable\DataTableBuilder;
use Umbrella\CoreBundle\DataTable\DataTableType;

class InsuranceClaimTableType extends DataTableType
{
    public function buildTable(DataTableBuilder $builder, array $options)
    {
        $builder->addFilter('search', SearchType::class);
        $builder->addAction('add', ButtonAddActionType::class, [
            'route' => 'app_admin_insuranceclaim_edit',
        ]);

        $builder->add('id');
        $builder->add('dateOfTheLoss', DateColumnType::class,[
            'label' => 'Date du sinistre'
        ]);
        $builder->add('place',PropertyColumnType::class,[
            'label' => 'Lieu du sinistre'
        ]);
        $builder->add('natureOfTheClaim',PropertyColumnType::class,[
            'label' => 'Circonstances détaillées du sinistre'
        ]);
        $builder->add('natureOfTheDamages',PropertyColumnType::class,[
            'label' => 'Dégâts constatés sur le véhicule'
        ]);
        $builder->add('contractNumber',PropertyColumnType::class,[
            'label' => 'Numéro du contrat d\'assurance'
        ]);
        $builder->add('vehicleModel',PropertyColumnType::class,[
            'label' => 'Modèle du véhicule'
        ]);
        $builder->add('vehicleRegistrationNumber',PropertyColumnType::class,[
            'label' => 'Numéro d\'immatriculation du véhicule'
        ]);
        $builder->add('vehicleLocation',PropertyColumnType::class,[
            'label' => 'Lieu où se trouve le véhicule actuellement'
        ]);
        $builder->add('status', PropertyColumnType::class, [
            'label' => 'Statut'
        ]);
        $builder->add('__action__', ActionColumnType::class, [
            'build' => function (ColumnActionBuilder $builder, InsuranceClaim $e) {
                $builder->editLink([
                    'route' => 'app_admin_insuranceclaim_edit',
                    'route_params' => ['id' => $e->getId()],
                ]);
            }
        ]);

        $builder->useEntityAdapter([
            'class' => InsuranceClaim::class,
            'query' => function(QueryBuilder $qb, array $formData) {
                if (isset($formData['search'])) {
                    $qb->andWhere('LOWER(e.search) LIKE :search');
                    $qb->setParameter('search', '%' . $formData['search'] . '%');
                }
            }
        ]);
    }

}
