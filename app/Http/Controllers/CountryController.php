<?php

namespace App\Http\Controllers;

use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $countryService;

    public function __construct(CountryService $countryService) {
        $this->countryService = $countryService;
    }

    public function index() {
        $countries = $this->countryService->fetchCountries();
        return response()->json($countries);
    }
}
