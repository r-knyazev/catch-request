<?php

namespace Application\controllers;

use Application\services\storage\FileStorage;
use Application\services\storage\StorageInterface;

abstract class AbstractController
{
    private ?StorageInterface $storage = null;

    /**
     * @return StorageInterface|null
     */
    public function getStorage(): ?StorageInterface
    {
        return $this->storage ?: new FileStorage();
    }
}