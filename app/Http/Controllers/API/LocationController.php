<?php

namespace App\Http\Controllers\API;

use App\Models\Region;
use App\Models\Location;
use App\Http\Resources\Location as LocationResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\LocationCollection;
use Illuminate\Http\Request;

class LocationController extends Controller {
    public function index()
    {
        return new LocationCollection(Location::paginate(10));
    }

    public function show($code)
    {
        $location = Location::where('code', strtoupper($code))->first();

        if ($location)
        {
            return new LocationResource($location);
        } else {
            return response()->json([
                'message' => 'Location Not Found',
            ], 404);
        }
    }

    public function fetch(Request $request)
    {
        $locations = [];

        if ($request->has('region_code')):
            $region = Region::where('code', strtoupper($request->region_code))->first();
            $locations = $region->locations;
        endif;

        return new LocationCollection($locations);
    }
}