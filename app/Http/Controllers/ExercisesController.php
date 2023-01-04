<?php

namespace App\Http\Controllers;

use App\Services\PrimeNumbersService;
use App\Services\ASCIIService;
use App\Services\TVSeriesService;
use App\Services\ABTestService;
use Illuminate\View\View;

class ExercisesController extends Controller
{
    /**
     * Display prime numbers
     *
     * @return \Illuminate\View\View
     */
    public function primeNumbers(PrimeNumbersService $primeNumberService): View
    {
        try {
            $primeFactors = $primeNumberService->getPrimeFactorsRange(1, 100);
        } catch (\InvalidArgumentException $e) {
            $primeFactors = [];
        }

        return view('prime_numbers', ['primeFactors' => $primeFactors]);
    }

    /**
     * Display ASCII array
     *
     * @return \Illuminate\View\View
     */
    public function asciiArray(ASCIIService $asciiService): View
    {
        try {
            $ascii = $asciiService->getASCIIRange(',', '|');

            if (count($ascii['missing']) === 1) {
                $ascii['missing'] = current($ascii['missing']);
            } else {
                $ascii = [];
            }
        } catch (\InvalidArgumentException $e) {
            $ascii = [];
        }

        return view('ascii_array', ['ascii' => $ascii]);
    }

    /**
     * Display tv series
     *
     * @return \Illuminate\View\View
     */
    public function tvSeries(TVSeriesService $tvSeriesService): View
    {
        try {
            $nextSerie = $tvSeriesService->getNextShow();
        } catch (\InvalidArgumentException $e) {
            $nextSerie = null;
        }

        return view('tv_series', ['nextSerie' => $nextSerie]);
    }

    /**
     * Display a\b testing
     *
     * @return \Illuminate\View\View
     */
    public function abTesting(ABTestService $abtest): View
    {
        try {
            $design = $abtest->getDesign();
        } catch (\InvalidArgumentException $e) {
            $design = null;
        }

        // View should be replaced with the design retrieved
        return view('ab_test', ['design' => $design]);
    }
}