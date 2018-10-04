<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Class RequestType
 * @package AppBundle\Form
 */
class ChiefType extends AbstractType
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Chief'
        ));
    }
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('education', TextType::class, array())
            ->add('description', TextareaType::class, array())
            ->add('location', TextType::class, array())
            ->add('visitRadius', IntegerType::class, array())
            ->add('tags', ChoiceType::class, array(
                'multiple' => true,
                'choices' => ['WDNEBGVJWER' => '12', 'slijhvldnfs.' => '23', 'VFVFGFSDV' => '34']
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Comment'
            ))
            ->getForm();
    }
}
