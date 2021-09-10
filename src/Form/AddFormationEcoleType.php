<?php

namespace App\Form;
use App\Entity\Ecole;
use App\Entity\Formation;
use App\Repository\EcoleRepository;
use App\Repository\FormationRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddFormationEcoleType extends AbstractType
{
    private $formationRepository;
    public function __construct(FormationRepository $formationRepository){
        $this->formationRepository = $formationRepository;
    }
    

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       /*  $id=$options['data']; */
       /*  dd($this->formationRepository->findByDifferentEcoleFormation($options['data'])); */
        $builder
            ->add('nom', EntityType::class,[
                'class' => Formation::class,
                'choice_label'=>'nom',
                /* 'query_builder'=>function(EntityRepository $repo) use($id){
                  /*   dd($repo->findByDifferentEcoleFormation($id)); 
                    return $repo->findByDifferentEcoleFormation($id);
                },  */

                 /*
                'data'=>$options['data'] */
              /*   'choices'=>$this->formationRepository->findByDifferentEcoleFormation($options['data'])  */
               
            ]) 
           
             ->add('Valider', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
        'data_class'=>NULL  
        ]);
    }
}
