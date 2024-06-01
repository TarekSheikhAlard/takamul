<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class CityDistrictController extends Controller
{
    public function index()
    {
        $cities = City::with('districts')->get();
        return response()->json($cities);
    }

    public function storeCity(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $city = City::create($request->all());

        return response()->json($city, 201);
    }

    public function storeDistrict(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        $district = District::create($request->all());

        return response()->json($district, 201);
    }

    public function updateCity(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $city->update($request->all());

        return response()->json($city);
    }

    public function updateDistrict(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
        ]);

        $district->update($request->all());

        return response()->json($district);
    }

    public function destroyCity(City $city)
    {
        $city->delete();

        return response()->json(null, 204);
    }

    public function destroyDistrict(District $district)
    {
        $district->delete();

        return response()->json(null, 204);
    }
}
