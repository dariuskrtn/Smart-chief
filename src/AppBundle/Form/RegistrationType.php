<?php
/**
 * Created by PhpStorm.
 * User: Darius
 * Date: 10/7/2018
 * Time: 2:40 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, [
            'required' => true,
            'attr' => [
                'maxlength' => '30',
                'minlength' => '3'
                ],
        ]);
        $builder->add('surname', TextType::class, [
            'required' => true,
            'attr' => [
                'maxlength' => '30',
                'minlength' => '3'
            ],
        ]);
        $builder->add('phone_number', TextType::class, [
            'required' => true,
            'attr' => [
                'maxlength' => '15',
                'minlength' => '5'
            ],
        ]);
        $builder->add('chief_user', CheckboxType::class, [
            'required' => false,
            'label' => 'Register as a chief?'
        ]);
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}