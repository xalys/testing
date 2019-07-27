<?php

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array('required' => false))
            ->add('lastname', null, array('required' => false))
            ->add('country', null, array('required' => true))
            //->add('dateOfBirth', null, array('required' => false))


            ->add('dateOfBirth',DateType::Class, array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-80),
                'label' => 'Дата рождения',
                'required' => true
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            //'data_class' => 'Application\Sonata\UserBundle\Entity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'user';
    }


}
