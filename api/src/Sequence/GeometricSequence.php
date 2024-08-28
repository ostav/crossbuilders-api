<?php

namespace App\Sequence;

use App\Model\SequenceParamsDto;

class GeometricSequence implements Sequence
{
    public function generateProgression(SequenceParamsDto $dto): array
    {
        $progression = [$dto->start];
        $current = $dto->start;

        for($i = 1; $i<$dto->size; $i++) {
            $current *= $dto->ratio;
            $progression[] = $current;
        }

        return $progression;
    }
}