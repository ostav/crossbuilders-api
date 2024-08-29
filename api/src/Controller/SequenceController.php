<?php

namespace App\Controller;

use App\Model\ArithmeticDto;
use App\Model\FibonacciDto;
use App\Model\GeometricDto;
use App\Sequence\Sequence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/v1/sequence')]
class SequenceController extends AbstractController
{
    #[Route('/arithmetic', name: 'api_sequence_arithmetic', methods: ['GET'])]
    public function arithmetic(
        #[Autowire(service: 'app.sequence.arithmetic')]
        Sequence $sequence,
        #[MapQueryString()]
        ArithmeticDto $arithmeticDto = new ArithmeticDto()
    ): JsonResponse
    {
        $response = $sequence->generateProgression($arithmeticDto);

        return $this->json($response);
    }

    #[Route('/geometric', name: 'api_sequence_geometric', methods: ['GET'])]
    public function geometric(
        #[Autowire(service: 'app.sequence.geometric')]
        Sequence $sequence,
        #[MapQueryString()]
        GeometricDto $geometricDto = new GeometricDto(),
    ): JsonResponse
    {
        $response = $sequence->generateProgression($geometricDto);

        return $this->json($response);
    }

    #[Route('/fibonacci', name: 'api_sequence_fibonacci', methods: ['GET'])]
    public function fibonacci(
        #[Autowire(service: 'app.sequence.fibonacci')]
        Sequence $sequence,
        #[MapQueryString()]
        FibonacciDto $fibonacciDto = new FibonacciDto(),
    ): JsonResponse
    {
        $response = $sequence->generateProgression($fibonacciDto);

        return $this->json($response);
    }
}