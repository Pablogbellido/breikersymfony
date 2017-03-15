<?php

namespace blogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComentarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contenido')
            ->add('enviar', 'submit')
        ;
    }

    /**
     * {@inheritdoc}
     */
    /*
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('contenido')
            ->add('usuarioId')
            ->add('mensajeId')
            ->add('save', 'submit')
        ;
    }
    */
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'blogBundle\Entity\Comentario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blogbundle_comentario';
    }


}
