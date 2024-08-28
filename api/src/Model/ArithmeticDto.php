<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ArithmeticDto implements SequenceParamsDto
{
    public function __construct(
        #[Assert\Type('integer')]
        public ?int $start = 0,
        #[Assert\Type('integer')]
        public ?int $end = 100,
        #[Assert\Type('integer')]
        public ?int $increment = 1
    ) {}
}