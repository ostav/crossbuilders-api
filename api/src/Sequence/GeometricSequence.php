<?php

namespace App\Sequence;

use App\Enum\SequenceTypeEnum;
use App\Model\SequenceDto;

class GeometricSequence implements SequenceInterface
{
    const DEFAULT_START_VALUE = 1;
    const DEFAULT_SIZE_VALUE = 10;
    const DEFAULT_RATIO_VALUE = 2;

    public function support(string $sequenceType): bool
    {
        return $sequenceType === SequenceTypeEnum::GEOMETRIC->value;
    }
    public function generateSequence(SequenceDto $dto): array
    {
        $dto = $this->setDefaultValues($dto);

        $progression = [$dto->start];
        $current = $dto->start;

        for($i = 1; $i<$dto->size; $i++) {
            $current *= $dto->ratio;
            $progression[] = $current;
        }

        return $progression;
    }

    public function setDefaultValues(SequenceDto $dto): SequenceDto
    {
        $dto->start = $dto->start === null ? self::DEFAULT_START_VALUE : $dto->start;
        $dto->size = $dto->size === null ? self::DEFAULT_SIZE_VALUE : $dto->size;
        $dto->ratio = $dto->ratio === null ? self::DEFAULT_RATIO_VALUE : $dto->ratio;

        return $dto;
    }
}