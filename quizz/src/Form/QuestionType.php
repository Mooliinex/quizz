<?php

namespace App\Form;

use App\Entity\Reponse;
use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('question')
            ->add('reponse')
            ->add('imageFile', VichImageType::class,[
                'label' => "Image" ,
                'download_label' => false,
                'delete_label' => false,
                'image_uri' => true,
                'required' => false,
                "attr" => [
                    "class" => "form-control",
                    "type" => "file",
                    "accept" => ".png, .jpg, .jpeg",
                    "required" => false
                ]
            ])
            // ->add('quiz',EntityType::class, [
            //     'class' => Quiz::class
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
