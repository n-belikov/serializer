<?php

namespace NiBurkin\Serializer\Traits;


use NiBurkin\Serializer\Contracts\SerializerFacadeInterface;

trait SerializerTrait
{
    /**
     * @var SerializerFacadeInterface
     */
    protected $facade;

    /**
     * @return SerializerFacadeInterface
     * @codeCoverageIgnore
     */
    public function getFacade()
    {
        return $this->facade;
    }

    /**
     * @param SerializerFacadeInterface $facade
     * @codeCoverageIgnore
     */
    public function setFacade(SerializerFacadeInterface $facade)
    {
        $this->facade = $facade;
    }
}