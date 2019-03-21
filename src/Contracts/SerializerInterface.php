<?php

namespace NiBurkin\Serializer\Contracts;


/**
 * Interface SerializerInterface
 */
interface SerializerInterface
{
    /**
     * @return SerializerFacadeInterface
     */
    public function getFacade();

    /**
     * @param SerializerFacadeInterface $facade
     */
    public function setFacade(SerializerFacadeInterface $facade);

    /**
     * @param $object
     * @param $name
     * @param array $params
     *
     * @return array|\JsonSerializable
     */
    public function serialize($object, $name, $params = []);

    /**
     * @param $object
     * @param string $name
     *
     * @return bool
     */
    public function accepts($object, $name);
}