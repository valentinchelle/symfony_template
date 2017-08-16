<?php

namespace OF\CalendarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        ->add('respoQuali', EntityType::class, array(
                'class' => 'OFUserBundle:User',
                'choice_label' => function($user){
                    return ''.$user->getPrenom().' '.$user->getNom();
                }
            ))
        ->add('entrepriseClient', TextType::class)
        ->add('typeClient', TextType::class)
        ->add('nomClient', TextType::class)
        ->add('prenomClient', TextType::class)

        ->add('civiliteClient', ChoiceType::class, array('choices'  => array(
        'Mme' => 'Mme',
        'Mr' => 'Mr'), 

        'label' => 'Civilité'))
        ->add('serviceClient', TextType::class)
        ->add('villeClient', TextType::class)
        ->add('paysClient', TextType::class)
        ->add('adresseMailClient', TextType::class)
        ->add('telephoneClient', TextType::class)
        ->add('commentaireClient', TextType::class)
        ->add('lieurdv', TextType::class, array('label' => 'Lieu de rdv'))
        ->add('lieudepart', TextType::class, array('label' => 'Lieu de fin'))
        ->add('nbUserMax', IntegerType::class, array('label' => 'Nombre de conférenciers'))
        ->add('nombreParticipants', IntegerType::class)
        ->add('startDate', DateType::class, array('widget' => 'single_text','format' => 'yyyy-MM-dd HH:mm:ss', 'label' => 'Date'))
        ->add('heureDebut', TimeType::class)
        ->add('heureFin', TimeType::class)
        ->add('langue', ChoiceType::class,array('choices'  => array(
        'Français' => 'Français',
        'Anglais' => 'Anglais')))
        ->add('contexte', TextType::class, array('required' => false))
        ->add('priorite', ChoiceType::class,array('choices'  => array(
        'Elevée' => 'Elevée',
        'Moyenne' => 'Moyenne',
        'Faible' => 'Faible' )))
        ->add('save',  SubmitType::class, array('label' => 'Enregistrer'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OF\CalendarBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'of_calendarbundle_event';
    }


}
