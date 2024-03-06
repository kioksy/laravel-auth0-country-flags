<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CountryService {
    protected $baseUrl;

    public function __construct() {
        $this->baseUrl = env('COUNTRIES_API_URL', 'https://restcountries.com/v3.1/all');
    }

    public function fetchCountries() {
        $cacheKey = 'countries_data';
        $cacheTime = 60 * 60;
        // Use Cache facade's remember method to either retrieve cached data or fetch fresh and cache it
        return Cache::remember($cacheKey, $cacheTime, function () {
            $response = Http::get($this->baseUrl);
            if ($response->successful()) {
                return $response->json();
            }
            return [];
        });
    }
}
