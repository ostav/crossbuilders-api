<?php

namespace App\Sequence;

use App\Enum\SequenceTypeEnum;
use App\Model\SequenceDto;

class FibonacciSequence implements SequenceInterface
{
    const DEFAULT_SIZE_VALUE = 30;
    public function support(string $sequenceType): bool
    {
        return $sequenceType === SequenceTypeEnum::FIBONACI->value;
    }
    public function generateSequence(SequenceDto $dto): array
    {
        $dto = $this->setDefaultValues($dto);
        $prev = 0;
        $current = 1;
        $loop = 0;

        while($loop < $dto->size){
            $progression[] = $prev;
            $next = $current + $prev;
            $prev = $current;
            $current = $next;
            $loop++;
        }

        return $progression;
    }

    public function setDefaultValues(SequenceDto $dto): SequenceDto
    {
        $dto->size = $dto->size === null ? self::DEFAULT_SIZE_VALUE : $dto->size;

        return $dto;
    }
}