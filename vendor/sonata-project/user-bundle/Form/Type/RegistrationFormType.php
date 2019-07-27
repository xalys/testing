<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Length;
class RegistrationFormType extends AbstractType
{
    /**
     * @var array
     */
    protected $mergeOptions;
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class The User class name
     * @param array $mergeOptions Add options to elements
     */
    public function __construct($class, array $mergeOptions = array())
    {
        $this->class = $class;
        $this->mergeOptions = $mergeOptions;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', null, array_merge(array(
                'label' => 'form.firstname',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('lastname', null, array_merge(array(
                'label' => 'form.lastname',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('username', null, array_merge(array(
                'label' => 'form.username',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('patronymic', null, array_merge(array(
                'label' => 'form.patronymic',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('email', 'email', array_merge(array(
                'label' => 'form.email',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('gender', 'choice', array('choices' => array('M' => 'Male', 'F' => 'Female')))
            ->add('land', null, array_merge(array(
                'label' => 'form.land',
                'translation_domain' => 'SonataUserBundle',
            ), $this->mergeOptions))
            ->add('plainPassword', 'repeated', array_merge(array(
                'type' => 'password',
                'constraints' => array(new Length(array('min' => 6))),
                'options' => array('translation_domain' => 'SonataUserBundle'),
                'first_options' => array_merge(array(
                    'label' => 'form.password',
                ), $this->mergeOptions),
                'second_options' => array_merge(array(
                    'label' => 'form.password_confirmation',
                ), $this->mergeOptions),
                'invalid_message' => 'fos_user.password.mismatch',
            ), $this->mergeOptions));
    }

    /**
     * {@inheritdoc}
     *
     * NEXT_MAJOR: remove this method.
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
            'intention' => 'registration',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sonata_user_registration';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
