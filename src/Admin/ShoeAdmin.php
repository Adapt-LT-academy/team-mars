<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

final class ShoeAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('Name')
			->add('Type')
			->add('Color')
			->add('Price')
			->add('Image')
			;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('Name')
			->add('Type')
			->add('Color')
			->add('Price')
			->add('Image')
			->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
			->add('Name')
			->add('Type')
			->add('Color')
			->add('Price')
			->add('Image')
			;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->add('Name')
			->add('Type')
			->add('Color')
			->add('Price')
			->add('Image')
			;
    }
}
