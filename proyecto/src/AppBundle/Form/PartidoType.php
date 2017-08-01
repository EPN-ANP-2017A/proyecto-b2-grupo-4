<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartidoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fecha')
            ->add('hora')
            ->add('equipo_local', EntityType::class, array(
                'class' => 'AppBundle:Equipo',
                'choice_label' => 'nombre',
                'placeholder' => 'Seleccione un equipo local'
            ))
            ->add('equipo_visitante', EntityType::class, array(
                'class' => 'AppBundle:Equipo',
                'choice_label' => 'nombre',
                'placeholder' => 'Seleccione un equipo visitante'
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Partido'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_partido';
    }


}
