<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    /**get data Provinces
     * @param
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProvinces()
    {
        $provinces = Province::select('id', 'name')->get();

        return response()->json($provinces);
    }

    /**get data Districts
     * @param $province_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();

        return response()->json($districts);
    }

    /** get data Communes
     * @param $district_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCommunes($district_id)
    {
        $wards = Commune::where('district_id', $district_id)->get();

        return response()->json($wards);
    }
}
