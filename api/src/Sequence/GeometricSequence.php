<?php

namespace App\Sequence;

use App\Model\SequenceParamsDto;

class GeometricSequence implements Sequence
{
    const DEFAULT_SIZE = 5;
    const DEFAULT_RATIO = 2;
    public function generateProgression(SequenceParamsDto $dto): array
    {
        $progression = [$dto->start];
        $size = $dto->size === null ? self::DEFAULT_SIZE : $dto->size;
        $ratio = $dto->ratio === null ? self::DEFAULT_RATIO : $dto->ratio;
        $current = $dto->start;

        for($i = 1; $i<$size; $i++) {
            $current *= $ratio;
            $progression[] = $current;
        }

        return $progression;
    }
}