<?php

namespace App\Sequence;

use App\Enum\SequenceTypeEnum;
use App\Model\SequenceDto;

class ArithmeticSequence implements SequenceInterface
{
    const DEFAULT_START_VALUE = 1;
    const DEFAULT_SIZE_VALUE = 10;
    const DEFAULT_INCREMENT_VALUE = 1;
    public function support(string $sequenceType): bool
    {
        return $sequenceType === SequenceTypeEnum::ARITHMETIC->value;
    }
    public function generateSequence(SequenceDto $dto): array
    {
        $dto = $this->setDefaultValues($dto);
        $progression = [$dto->start];
        $current = $dto->start;

        while($current <= $dto->size) {
            $current += $dto->increment;
            if ($current > $dto->size) {
                break;
            }
            $progression[] = $current;
        }

        return $progression;
    }

    public function setDefaultValues(SequenceDto $dto): SequenceDto
    {
        $dto->start = $dto->start === null ? self::DEFAULT_START_VALUE : $dto->start;
        $dto->size = $dto->size === null ? self::DEFAULT_SIZE_VALUE : $dto->size;
        $dto->increment = $dto->increment === null ? self::DEFAULT_INCREMENT_VALUE : $dto->increment;

        return $dto;
    }
}