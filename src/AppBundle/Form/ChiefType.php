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
            ->add('education', TextType::class, [
                'label' => 'Education',
                'required' => false,
                'attr' => [
                    'maxlength' => 40
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => true,
                'attr' => [
                    'minlength' => 10,
                    'maxlength' => 2000,
                ]
            ])
            ->add('location', TextType::class, [
                'label' => 'Location',
                'required' => true,
                'attr' => [
                    'minlength' => 3,
                    'maxlength' => 30
                ]
            ])
            ->add('visitRadius', IntegerType::class, [
                'label' => 'Visit Radius',
                'required' => true,
                'attr' => [
                    'maxlength' => '10'
                ]
            ])
            ->add('tags', ChoiceType::class, array(
                'label' => 'Tags',
                'multiple' => true,
                'choices' => [
                    'Blynai' => 'blynai',
                    'Desertai.' => 'desertai',
                    'Picos' => 'picos',
                    'Pyragai, Kepiniai' => 'pyragai',
                    'Salotos' => 'salotos',
                    'Sriubos' => 'sriubos',
                    'Sumuštiniai' => 'sumustiniai',
                    'Troškiniai' => 'troskiniai',
                    'Užkandžiai' => 'uzkandziai',
                    'Vaikams' => 'vaikams',
                    'Vegetariški' => 'vegetariski',
                    'Kiti' => 'kiti'
                ]
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Register'
            ))
            ->getForm();
    }
}
