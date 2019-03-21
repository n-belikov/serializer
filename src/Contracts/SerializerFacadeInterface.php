<?php

namespace Serializer\Contracts;


/**
 * Interface SerializerFacadeInterface
 */
interface SerializerFacadeInterface
{
    /**
     * @param SerializerInterface $serializer
     *
     * @return static
     */
    public function pushSerializer(SerializerInterface $serializer);

    /**
     * @param SerializerInterface[] $serializers
     */
    public function setSerializers(iterable $serializers);

    /**
     * @param $object
     * @param string $name
     *
     * @param array $params
     */
    public function serialize($object, $name = 'default', $params = []);
}