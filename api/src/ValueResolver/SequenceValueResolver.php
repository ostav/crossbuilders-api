<?php

namespace App\ValueResolver;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\Attribute\MapUploadedFile;
use Symfony\Component\HttpKernel\Controller\ValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NearMissValueResolverException;
use Symfony\Component\HttpKernel\KernelEvents;

class SequenceValueResolver implements ValueResolverInterface, EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelResponseArguments',
        ];
    }

    public function resolve(Request $request, ArgumentMetadata $argument): iterable
    {
        $attribute = $argument->getAttributesOfType(MapQueryString::class, ArgumentMetadata::IS_INSTANCEOF)[0]
            ?? $argument->getAttributesOfType(MapRequestPayload::class, ArgumentMetadata::IS_INSTANCEOF)[0]
            ?? $argument->getAttributesOfType(MapUploadedFile::class, ArgumentMetadata::IS_INSTANCEOF)[0]
            ?? null;

        if (!$attribute) {
            return [];
        }

        if (!$attribute instanceof MapUploadedFile && $argument->isVariadic()) {
            throw new \LogicException(sprintf('Mapping variadic argument "$%s" is not supported.', $argument->getName()));
        }

        if ($attribute instanceof MapRequestPayload) {
            if ('array' === $argument->getType()) {
                if (!$attribute->type) {
                    throw new NearMissValueResolverException(sprintf('Please set the $type argument of the #[%s] attribute to the type of the objects in the expected array.', MapRequestPayload::class));
                }
            } elseif ($attribute->type) {
                throw new NearMissValueResolverException(sprintf('Please set its type to "array" when using argument $type of #[%s].', MapRequestPayload::class));
            }
        }

        $attribute->metadata = $argument;

        return [$attribute];
    }

    public function onKernelResponseArguments(ExceptionEvent $event): void
    {
        $event->setResponse(new JsonResponse([$event->getThrowable()->getMessage()], Response::HTTP_NO_CONTENT));
    }
}