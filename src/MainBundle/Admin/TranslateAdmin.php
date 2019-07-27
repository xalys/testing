<?php

namespace MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class TranslateAdmin extends Admin
{

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('ru', null, array('editable' => true))
//            ->add('ky', null, array('editable' => true))
            //->add('en', null, array('editable' => true))
            ->add('attribute', null, array('label' => 'Url'))

            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
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
            ->add('ru', null, array('required' => false,))
//            ->add('ky', null, array('required' => false,))
            ->add('attribute', null, array('required' => false))
        ;
    }


    protected function configureRoutes(RouteCollection $collection)
    {
//        $collection->remove('create');
        $collection->remove('delete');
    }
}
