<?php

namespace Tests\Unit;

use App\Services\CountryService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CountryServiceTest extends TestCase
{
    public function testFetchCountries()
    {
        // Mock the HTTP facade
        Http::fake([
            '*' => Http::response(['country1', 'country2'], 200),
        ]);

        $service = new CountryService();

        // Call the method
        $countries = $service->fetchCountries();

        // Assert that the returned data is as expected
        $this->assertEquals(['country1', 'country2'], $countries);

        // Assert that the data was cached
        $this->assertTrue(Cache::has('countries_data'));
    }
}
