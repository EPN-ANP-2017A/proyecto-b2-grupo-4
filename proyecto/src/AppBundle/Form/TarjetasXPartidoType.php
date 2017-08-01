<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TarjetasXPartidoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tarjetasAmarillas')
            ->add('tarjetasRojas')
            ->add('jugador', EntityType::class, array(
                'class' => 'AppBundle:Jugador',
                'choice_label' => 'nombre',
                'placeholder' => 'Seleccione un jugador'
            ))
            ->add('partido', EntityType::class, array(
                'class' => 'AppBundle:Partido',
                'choice_label' => 'nombre',
                'placeholder' => 'Seleccione un partido'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TarjetasXPartido'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_tarjetasxpartido';
    }


}
