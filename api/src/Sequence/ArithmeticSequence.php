<?php

namespace App\Sequence;

use App\Model\SequenceParamsDto;

class ArithmeticSequence implements Sequence
{
    const END_DEFAULT = 100;
    const DEFAULT_INCREMENT = 1;

    public function generateProgression(SequenceParamsDto $dto): array
    {
        $end = $dto->end === null ? self::END_DEFAULT : $dto->end;
        $increment = $dto->increment === null ? self::DEFAULT_INCREMENT: $dto->increment;

        if ($end < $dto->start) {
            return [];
        }

        $progression = [$dto->start];
        $current = $dto->start;

        while($current <= $end) {
            $current += $increment;
            if ($current > $end) {
                break;
            }
            $progression[] = $current;
        }

        return $progression;
    }
}