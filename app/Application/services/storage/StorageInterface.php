<?php

namespace Application\services\storage;

interface StorageInterface
{
    public function get(): array;

    public function set(string $data): void;

    public function clear(): void;
}