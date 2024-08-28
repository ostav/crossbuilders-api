<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class GeometricDto implements SequenceParamsDto
{
    public function __construct(
        #[Assert\GreaterThan(0)]
        public ?int $start = null,
        #[Assert\GreaterThan(0)]
        public ?float $ratio = null,
        #[Assert\GreaterThanOrEqual(1)]
        public ?int $size = null
    ) {}
}