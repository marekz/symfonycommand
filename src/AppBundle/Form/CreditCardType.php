<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CreditCardType extends AbstractType {
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('cardNumber')
                ->add('cvvNumber')
                ->add('cardType', ChoiceType::class, array(
                    'choices' => array(
                        "MasterCard" => 'MS',
                        "Visa" => 'VI',
                        "AmericanExpress" => 'AE'
                    )
                ))
                ->add('save', SubmitType::class, array('label' => 'Create Task'))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CreditCard' 
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_creditcard';
    }
}
