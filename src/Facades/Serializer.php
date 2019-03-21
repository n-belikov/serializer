<?php

namespace Serializer\Facades;


use Serializer\Contracts\SerializerFacadeInterface;
use Serializer\Contracts\SerializerInterface;

class Serializer implements SerializerFacadeInterface
{
    /**
     * @var SerializerInterface[]
     */
    protected $serializers = [];

    /**
     * @return SerializerInterface[]
     */
    public function getSerializers()
    {
        return $this->serializers;
    }

    /**
     * @param SerializerInterface[] $serializers
     */
    public function setSerializers(iterable $serializers)
    {
        $this->serializers = [];
        foreach ($serializers as $serializer) {
            $this->serializers[] = $serializer;
            $serializer->setFacade($this);
        }
    }

    /**
     * @param SerializerInterface $serializer
     *
     * @return $this
     */
    public function pushSerializer(SerializerInterface $serializer)
    {
        $this->serializers[] = $serializer;
        $serializer->setFacade($this);
        return $this;
    }

    /**
     * @param $object
     * @param string $name
     *
     *
     * @param array $params
     * @return array|\JsonSerializable
     * @throws SerializerNotFoundException
     */
    public function serialize($object, $name = 'default', $params = [])
    {
        if (is_null($object)) {
            return null;
        }

        foreach ($this->serializers as $serializer) {
            if ($serializer->accepts($object, $name)) {
                return $serializer->serialize($object, $name, $params);
            }
        }

        $class = get_class($object);
        throw new SerializerNotFoundException("Cannot find serializer for $class [$name]");
    }
}
