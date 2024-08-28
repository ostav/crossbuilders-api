<?php

namespace App\Sequence;

use App\Model\SequenceParamsDto;

class ArithmeticSequence implements Sequence
{
    public function generateProgression(SequenceParamsDto $dto): array
    {
        if ($dto->end < $dto->start) {
            return [];
        }

        $progression = [$dto->start];
        $current = $dto->start;

        while($current <= $dto->end) {
            $current += $dto->increment;
            if ($current > $dto->end) {
                break;
            }
            $progression[] = $current;
        }

        return $progression;
    }
}