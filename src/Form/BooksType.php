<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Books;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;


class BooksType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('year_of_publication')
            ->add('edition')
            ->add('ISBN')
            ->add('number_of_pages')
            ->add('author', EntityType::class, [
                'class' => Author::class,
                'query_builder' => function ($repository) {
                    return $repository->createQueryBuilder('a')->orderBy('a.surname', 'ASC');
                },
                'choice_label' => 'surname',
            ])
            ->add('author2', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'surname',
                'required' => false,

            ])
            ->add('author3', EntityType::class, [
                'class' => Author::class,
                'choice_label' => 'surname',
                'required' => false,

            ])
            ->add('cover', FileType::class, [
                'label' => 'cover (png, jpg, webp)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new Image([
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Books::class,
        ]);

    }
}
