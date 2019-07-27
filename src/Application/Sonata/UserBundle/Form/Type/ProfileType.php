<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Sonata\UserBundle\Model\UserInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
{

    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'sonata_user_gender', array(
                'label'              => 'form.label_gender',
                'required'           => true,
                'translation_domain' => 'SonataUserBundle',
                'choices'            => array(
                    UserInterface::GENDER_FEMALE => 'gender_female',
                    UserInterface::GENDER_MALE   => 'gender_male',
                ),
            ))
            ->add('firstname', null, array(
                'label'    => 'form.label_firstname',
                'required' => true,
            ))
            ->add('lastname', null, array(
                'label'    => 'form.label_lastname',
                'required' => true,
            ))
            ->add('dateOfBirth', 'birthday', array(
                'label'    => 'form.label_date_of_birth',
                'required' => true,
                'widget'   => 'single_text',
            ))
        ;
    }

    /**
     * {@inheritdoc}
     *
     * @deprecated Remove it when bumping requirements to Symfony 2.7+
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
//            'data_class' => 'Application\Sonata\UserBundle\Entity\User',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
//        return 'applicationsonata_user_profile';
        return 'sonata_user_profile';

    }
}
