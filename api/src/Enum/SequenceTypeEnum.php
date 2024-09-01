<?php

namespace App\Enum;

enum SequenceTypeEnum: string
{
     case ARITHMETIC = 'arithmetic';
     case GEOMETRIC = 'geometric';
     case FIBONACI = 'fibonaci';
}
