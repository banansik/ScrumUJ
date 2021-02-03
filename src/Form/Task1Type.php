<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\Task;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Task1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('status', ChoiceType::class,[
                'choices'=>[
                    'TO DO' => 'todo',
                    'In Progress' => 'inprog',
                    'Done' => 'done',]
    ])
            ->add('description')
            ->add('need')
            ->add('priority')
            ->add(
                'project',EntityType::class,
                [
                    'class' => Project::class,
                    'choice_label' => function ($project) {
                        return $project->getName();
                    },
                    'label' => 'label_category',
                    'placeholder' => 'label_none',
                    'required' => true,
                ]
            );
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
