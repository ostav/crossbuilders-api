<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class FibonacciDto implements SequenceParamsDto
{
    public function __construct(
        #[Assert\GreaterThanOrEqual(1)]
        public ?int $size = 10
    ) {}
}