<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ArithmeticDto implements SequenceParamsDto
{
    public function __construct(
        #[Assert\Type('integer')]
        public ?int $start = null,
        #[Assert\Type('integer')]
        public ?int $end = null,
        #[Assert\Type('integer')]
        public ?int $increment = null
    ) {}
}