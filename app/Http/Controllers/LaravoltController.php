<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Facade as Indonesia;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class LaravoltController extends Controller
{
    //
    public function provinces()
    {
        return Indonesia::allProvinces();
    }

    public function cities(Request $request)
    {
        try {
            $province = Province::where('name','=', $request->name)->get();
            $provinceId = $province[0]['id'];

            return Indonesia::findProvince($provinceId, ['cities'])->cities->pluck('name', 'id');

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }

    }

    public function districts(Request $request)
    {
        try {
            $city = City::where('name','=', $request->name)->get();
            $cityId = $city[0]['id'];

            return Indonesia::findCity($cityId, ['districts'])->districts->pluck('name', 'id');

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'name' => $request->name


            ]);
        }

    }

    public function villages(Request $request)
    {
        try {
            $district = District::where('name','=', $request->name)->get();
            $districtId = $district[0]['id'];

            return Indonesia::findDistrict($districtId, ['villages'])->villages->pluck('name', 'id');

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),

            ]);
        }

    }
}
