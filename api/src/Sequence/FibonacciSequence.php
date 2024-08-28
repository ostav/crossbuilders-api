<?php

namespace App\Sequence;

use App\Model\SequenceParamsDto;

class FibonacciSequence implements Sequence
{
    public function generateProgression(SequenceParamsDto $dto): array
    {
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
}