<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\DTO\SomeObject;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SomeObjectType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SomeObject::class,
        ]);

        $resolver->setDefault('some_option', null);
        $resolver->setAllowedTypes('some_option', ['null', 'int']);
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('someField', SomeFieldType::class, [
            'some_option' => $options['some_option'],
        ]);
    }
}
