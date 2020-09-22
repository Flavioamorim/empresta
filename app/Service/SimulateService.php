<?php

namespace App\Service;

use App\Repository\InstituitionFeeRepository;
use App\Helper\Helper;

class SimulateService
{
    /**
     * @var InstituitionFeeRepository
     */
    private $instituteFeeRepository;

    /**
     * SimulateService constructor.
     * @param InstituitionFeeRepository $instituteFeeRepository
     */
    public function __construct(InstituitionFeeRepository $instituteFeeRepository)
    {
        $this->instituteFeeRepository = $instituteFeeRepository;
    }

    /**
     * @param \Illuminate\Http\Request $params
     * @return array
     */
    public function executeSimulation(array $params): array
    {
        $instituitionList = [];
        $items = $this->instituteFeeRepository->getByFilter($params);

        foreach ($items as $index => $item) {

            $instituitionList[] = [
                'instituicao' => $item['instituicao'],
                'taxa' => $item['taxaJuros'],
                'valor_parcela' => $this->executeCalcOfPortion($params['valor_emprestimo'], $item['coeficiente']),
                'parcelas' => $item['parcelas'],
                'convenio' => $item['convenio']
            ];
        }

        return $instituitionList;
    }

    /**
     * Execute calc of portion
     * @param $valueLoan
     * @param $coefficient
     * @return string
     */
    private function executeCalcOfPortion(float $valueLoan, float $coefficient): string
    {
        $valueLoan = Helper::removePointsOfValue($valueLoan);
        $portion = $valueLoan * $coefficient;

        return Helper::formatPrice($portion);
    }
}
