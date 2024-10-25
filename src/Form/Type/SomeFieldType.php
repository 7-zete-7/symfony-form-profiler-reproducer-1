<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Contract\SomeValueResolverInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class SomeFieldType extends AbstractType
{
    public function __construct(
        private readonly SomeValueResolverInterface $someValueResolver,
    ) {
    }

    public function getParent(): string
    {
        return ChoiceType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [
                'foo' => 'foo',
                'bar' => 'bar',
            ],
        ]);

        $resolver->setDefault('some_option', null);
        $resolver->setAllowedTypes('some_option', ['null', 'int']);
        $resolver->setNormalizer('some_option', fn (Options $options, ?int $value): int => $value ?? $this->someValueResolver->resolveValue());
    }
}
