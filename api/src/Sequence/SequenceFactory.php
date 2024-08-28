<?php

namespace App\Sequence;

class SequenceFactory
{
    public static function createArithmeticSequence(): Sequence
    {
        return new ArithmeticSequence();
    }

    public static function createGeometricSequence(): Sequence
    {
        return new GeometricSequence();
    }
}