<?php

namespace OF\FaqBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        ->add('title', TextType::class, array('label' => 'Question'))
        ->add('content', TextType::class, array('label' => 'Information complémentaire'))
        ->add('category', ChoiceType::class, array(
        'choices'  => array(
        'Extérieurs des bâtiments' => 'Extérieurs des bâtiments',
        'Espace de créativité' => 'Espace de créativité',
        'Centre de Conférence' => 'Centre de Conférence',
        'Rez-de-chaussée Opale' =>'Rez-de-chaussée Opale',
        'Showroom' => 'Showroom',
        'Halle d’essais' => 'Halle d’essais',
        'Général'=>'Général',


        ),
        'label'=> 'Catégorie'

        ))
        ->add('save',  SubmitType::class, array('label' => 'Poser'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OF\FaqBundle\Entity\Question'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'of_faqbundle_question';
    }


}
