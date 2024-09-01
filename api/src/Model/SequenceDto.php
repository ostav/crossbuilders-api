<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class SequenceDto
{
    public function __construct(
        #[Assert\GreaterThan(0)]
        public ?float $ratio = null ,
        #[Assert\Type('integer')]
        public ?int $start = null,
        #[Assert\Type('integer')]
        public ?int $size = null,
        #[Assert\GreaterThan(0)]
        public ?int $increment = null,
    ){}
}