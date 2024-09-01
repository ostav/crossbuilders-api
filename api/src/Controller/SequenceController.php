<?php

namespace App\Controller;

use App\Enum\SequenceTypeEnum;
use App\Model\SequenceDto;
use App\Sequence\SequenceFactory;
use App\ValueResolver\SequenceValueResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/v1')]
class SequenceController extends AbstractController
{
    #[Route('/sequence/{sequence}', name: 'api_sequence_arithmetic', methods: ['GET'])]
    public function sequence(
        SequenceTypeEnum $sequence,
        SequenceFactory $sequenceFactory,
        #[MapQueryString(resolver: SequenceValueResolver::class)]
        SequenceDto $dto = new SequenceDto(),
    ): JsonResponse
    {
        $sequenceProvider = $sequenceFactory->getSequenceProvider($sequence->value);

        return $this->json($sequenceProvider->generateSequence($dto));
    }
}