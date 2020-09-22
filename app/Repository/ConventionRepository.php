<?php

namespace App\Repository;

class ConventionRepository
{
    private const FILE = '/app/simulador/convenios.json';

    /**
     * ConventionRepository constructor.
     */
    public function __construct()
    {
        $this->content = json_decode(file_get_contents(storage_path(self::FILE)), true);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->content;
    }
}
