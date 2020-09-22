<?php

namespace App\Repository;

class InstituitionRepository
{
    private const FILE = '/app/simulador/instituicoes.json';

    /**
     * InstituitionRepository constructor.
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
