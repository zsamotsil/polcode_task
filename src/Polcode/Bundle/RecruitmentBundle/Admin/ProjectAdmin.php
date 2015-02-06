<?php

namespace Polcode\Bundle\RecruitmentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProjectAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt')
            ->add('endAt')
            ->add('id')
            ->add('am')
            ->add('startDate')
            ->add('endDate')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt')
            ->add('endAt')
            ->add('am')
            ->add('startDate')
            ->add('endDate')    
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt')
            ->add('endAt')
            ->add('am')
            ->add('startDate')
            ->add('endDate')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt')
            ->add('endAt')
            ->add('am')
            ->add('startDate')
            ->add('endDate')
        ;
    }
}
