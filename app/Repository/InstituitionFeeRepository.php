<?php

namespace App\Repository;

use App\Helper\Helper;
use phpDocumentor\Reflection\Types\Collection;

class InstituitionFeeRepository
{
    private const FILE = '/app/simulador/taxas_instituicoes.json';

    public function __construct()
    {
        $this->content = json_decode(file_get_contents(storage_path(self::FILE)), true);
        $this->content = collect($this->content);
    }

    public function getAll()
    {
        return $this->content;
    }

    /**
     * Execute query by filter
     * @param $params
     * @return \Illuminate\Support\Collection
     */
    public function getByFilter($params)
    {
        $data = $this->content;
        if (!empty($params['parcela'])) {
            $data = $data->where('parcelas', $params['parcela']);
        }

        if (!empty($params['convenios'])) {
            $convenios = Helper::convertToUpper($params['convenios']);
            $data = $data->whereIn('convenio', $convenios);
        }

        if (!empty($params['instituicoes'])) {
            $instituition = Helper::convertToUpper($params['instituicoes']);
            $data = $data->whereIn('instituicao', $instituition);
        }

        return $data;
    }
}
