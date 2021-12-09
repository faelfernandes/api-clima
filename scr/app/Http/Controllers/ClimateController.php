<?php

namespace App\Http\Controllers;

use App\Models\Climate as Climate;
use App\Http\Resources\Climate as ClimateResource;
use App\Http\Controllers\OpenWeatherMap;
use Illuminate\Http\Request;

class ClimateController extends Controller
{
    public $openweathermap;

    public function __construct()
    {
        $this->openweathermap = new OpenWeatherMap();
    }

    public function teste($state, $city)
    {
        return $this->openweathermap->getCityTemperatureInformation($state, $city);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $climates = Climate::paginate(15);
        return ClimateResource::collection($climates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $climate = new Climate;
        $climate->city_name     = $request->input('city_name');
        $climate->state_code    = $request->input('state_code');
        $climate->country_code  = $request->input('country_code');
        $climate->temp          = $request->input('temp');
        $climate->temp_min      = $request->input('temp_min');
        $climate->temp_max      = $request->input('temp_max');

        if ($climate->save()) {
            return new ClimateResource($climate);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $climate = Climate::findOrFail($id);
        return new ClimateResource($climate);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $climate = Climate::findOrFail($request->id);
        $climate->city_name     = $request->input('city_name');
        $climate->state_code    = $request->input('state_code');
        $climate->country_code  = $request->input('country_code');
        $climate->temp          = $request->input('temp');
        $climate->temp_min      = $request->input('temp_min');
        $climate->temp_max      = $request->input('temp_max');

        if ($climate->save()) {
            return new ClimateResource($climate);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $climate = Climate::findOrFail($id);
        if ($climate->delete()) {
            return new ClimateResource($climate);
        }
    }
}
