<?php

declare(strict_types=1);

namespace App\Services;

use App\Libraries\ABTest\Engine\Engine;
use App\Libraries\ABTest\Test\Test;
use App\Libraries\ABTest\Storage\Adapter\Session;
use App\Libraries\ABTest\Storage\Storage;
use App\Libraries\ABTest\Test\Filter\PercentageFilter;
use App\Libraries\ABTest\Variation\PercentageVariation;
use Exads\ABTestData;

/**
 * Class ABTestService
 *
 * @package App\Services
 */

class ABTestService
{
    /**
     * @var Engine
     */
    private Engine $engine;

    /**
     * @var array
     */
    private array $data;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Get promotion data
        $data = $this->getData(1);

        $promotionName = $data['promotion'];

        // Adapter to use
        $adapter = new Session($promotionName);
        
        $this->engine = new Engine(
            new Storage($adapter),
            new PercentageVariation($promotionName)
        );

        $this->data = $data;

        $this->loadData();
    }

    /**
     * Get design
     * 
     * @return string Design name to use
     */
    public function getDesign()
    {
        $test = $this->engine->start();

        return $test->getIdentifier();
    }

    /**
     * Get data
     * 
     * @param int $promoID
     * 
     * @return array Data array
     */
    private function getData(int $promoID): array
    {
        $abTest = new ABTestData($promoID);
        
        $promotion = $abTest->getPromotionName();
        
        $designs = $abTest->getAllDesigns();
        
        return [
            'promotion' => $abTest->getPromotionName(),
            'designs'   => $designs,
        ];
    }

    /**
     * Load data
     * 
     * @return void
     * 
     * @throws Exception
     */
    private function loadData(): void
    {
        $data = $this->data;

        foreach ($data['designs'] as $design) {
            if (!isset($design['designName']) || !isset($design['splitPercent'])) {
                continue;
            }

            $designID = (string) $design['designId'] ?? rand(1, 100);

            $filter = new PercentageFilter($designID, intval($design['splitPercent']));
            $test = new Test($design['designName'], $filter);
            $this->engine->addTest($test);
        }
    }
}
