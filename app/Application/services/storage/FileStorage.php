<?php

namespace Application\services\storage;

class FileStorage implements StorageInterface
{
    protected string $file;

    public function __construct()
    {
        $this->file = $_ENV['APP_BASE_PATH'] . '/Application/cache/requests.log';
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return array_filter(array_reverse(explode(PHP_EOL, file_get_contents($this->file))));
    }

    /**
     * @param string $data
     * @return void
     */
    public function set(string $data): void
    {
        file_put_contents($this->file, $data . PHP_EOL, FILE_APPEND);
    }

    /**
     * @return void
     */
    public function clear(): void
    {
        file_put_contents($this->file, '');
    }
}