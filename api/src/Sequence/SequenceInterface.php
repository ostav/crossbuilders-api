<?php

namespace App\Sequence;

use App\Model\SequenceDto;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag(name: "sequence_provider")]
interface SequenceInterface
{
    public function support(string $sequenceType): bool;
    public function generateSequence(SequenceDto $dto): array;
    public function setDefaultValues(SequenceDto $dto): SequenceDto;
}