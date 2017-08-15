<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarjetasType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('amarillas')
            ->add('rojas')
            ->add('jugador', EntityType::class, array(
                'class' => 'AppBundle:Jugador',
                'choice_label' => 'nombre',
                'placeholder' => 'Seleccione un jugador'
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
            'data_class' => 'AppBundle\Entity\Tarjetas'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tarjetas';
    }


}
