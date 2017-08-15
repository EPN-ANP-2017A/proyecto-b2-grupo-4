<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GolesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numero')
            ->add('jugador', EntityType::class, array(
                'class' => 'AppBundle:Jugador',
                'choice_label' => 'nombre',
                'placeholder' => 'Seleccione un Jugador'
            ))
            ->add('partido', EntityType::class, array(
                'class' => 'AppBundle:Partido',
                'choice_label' => 'id',
                'placeholder' => 'Seleccione una fecha'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Goles'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_goles';
    }


}
