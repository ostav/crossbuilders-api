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
        #[Assert\GreaterThan(0)]
        public ?int $increment = 1
    ){}
}