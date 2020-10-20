<?php

namespace App\Http\Controllers\API;

use App\Models\Region;
use App\Http\Resources\Region as RegionResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegionCollection;
use App\Http\Resources\LocationCollection;

class RegionController extends Controller {
    public function index()
    {
        return new RegionCollection(Region::all());
    }

    public function show($code)
    {
        $region = Region::where('code', strtoupper($code))->first();

        if ($region)
        {
            return new RegionResource($region);
        } else {
            return response()->json([
                'message' => 'Region Not Found',
            ], 404);
        }
    }

    public function locations($code)
    {
        $region = Region::where('code', strtoupper($code))->first();
        $locations = $region->locations;

        return new LocationCollection($locations);
    }
}