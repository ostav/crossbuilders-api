<?php

namespace App\Sequence;

use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;
final readonly class SequenceFactory
{
    public function __construct(
        #[AutowireIterator('sequence_provider')]
        private iterable $sequenceProviders
    ) {
    }

    public function getSequenceProvider(string $sequenceType): SequenceInterface
    {
        /** @var SequenceInterface $sequenceProvider */
        foreach ($this->sequenceProviders as $sequenceProvider) {
            if ($sequenceProvider->support($sequenceType)) {
                return $sequenceProvider;
            }
        }

        throw new \Exception('No sequence found');
    }
}