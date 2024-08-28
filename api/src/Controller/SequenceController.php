<?php

namespace App\Controller;

use App\Model\ArithmeticDto;
use App\Sequence\Sequence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sequence')]
class SequenceController extends AbstractController
{
    #[Route('/arithmetic', name: 'api_sequence_arithmetic', methods: ['GET'])]
    public function arithmetic(
        Sequence $sequence,
        #[MapQueryString()] ArithmeticDto $arithmeticDto = new ArithmeticDto()
    ): JsonResponse
    {

        $response = $sequence->generateProgression($arithmeticDto);

        return $this->json($response);
    }
}