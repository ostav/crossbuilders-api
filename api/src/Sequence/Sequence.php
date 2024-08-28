<?php

namespace App\Sequence;

use App\Model\SequenceParamsDto;

interface Sequence
{
    public function generateProgression(SequenceParamsDto $dto): array;
}