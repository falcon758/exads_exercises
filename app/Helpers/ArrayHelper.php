<?php

namespace App\Helpers;

class ArrayHelper
{
    /**
     * Remove random element
     *
     * @param array $elements
     * 
     * @return array
     */
    public static function removeRandom(array $elements): array
    {
        if (count($elements) === 0) {
            return $elements;
        }

        unset($elements[array_rand($elements)]);

        return $elements;
    }

    /**
     * Missing element
     *
     * @param array $previousElements
     * @param array $currentElements
     * 
     * @return array
     */
    public static function missingElement(array $previousElements, array $currentElements): array
    {
        return array_diff($previousElements, $currentElements);
    }
}