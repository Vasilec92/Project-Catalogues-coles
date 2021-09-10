<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\Ecole;
use App\Entity\Module;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
          /*   ->add('ecole',EntityType::class,[
                'class' => Ecole::class,
                'choice_label'=>'nom',
                'multiple' => true,
            ])
            ->add('module',EntityType::class,[
                'class' => Module::class,
                'choice_label'=>'nom',
                'multiple' => true,
            ]) */
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
