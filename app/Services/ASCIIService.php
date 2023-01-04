<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Class ASCIIService
 *
 * @package App\Services
 */

 use App\Libraries\ASCII\ASCII;
 use App\Helpers\ArrayHelper;

class ASCIIService
{
    /**
     * @var ASCII
     */
    private ASCII $ascii;

    /**
     * @param ASCII $primeNumber
     */
    public function __construct(ASCII $ascii)
    {
        $this->ascii = $ascii;
    }
    
    /**
     * Get ASCII Range
     *
     * @return array
     * 
     * @throws InvalidArgumentException
     */
    public function getASCIIRange(string $start, string $end): array
    {
        $ascii = $this->ascii;

        $asciiStart = $ascii->setCharacter($start)->getBytes();
        $asciiEnd   = $ascii->setCharacter($end)->getBytes();

        // Check if start and end range are valid
        if ($asciiStart <= 0 || $asciiEnd < $asciiStart) {
            throw new \InvalidArgumentException('Start and end range should have a valid range.');
        }

        $asciiResult = [$start];

        // Loop through all range numbers
        for ($number = $asciiStart; $number < $asciiEnd; $number++) {
            $asciiResult[] = $ascii->setBytes($number)->getCharacter();
        }

        $asciiResult[] = $end;

        // Remove random element
        $newASCIIResult = ArrayHelper::removeRandom($asciiResult);

        return [
            'ascii'   => $newASCIIResult,
            'missing' => ArrayHelper::missingElement($asciiResult, $newASCIIResult)
        ];
    }
}
