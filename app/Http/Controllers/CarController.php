<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $skip = request()->input('skip', 0);
        $take = request()->input('take', Car::get()->count());
        
        return Car::skip($skip)->take($take)->get();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'brand' => 'required|min:2',  
            'model' => 'required|min:2',
            'year' => 'required|integer',
            'maxSpeed' => 'required|between:20,300',
            'isAutomatc' => 'required',
            'engine' => 'required',
            'numberOfDoors' => 'required|between:2,5'
            ]);
        
        $car = new Car();
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->maxSpeed = $request->input('maxSpeed');
        $car->isAutomatc = $request->input('isAutomatc');
        $car->engine = $request->input('engine');
        $car->numberOfDoors = $request->input('numberOfDoors');

        $car->save();
        return $car;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Car::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'brand' => 'required|min:2',  
            'model' => 'required|min:2',
            'year' => 'required|integer',
            'maxSpeed' => 'required|between:20,300',
            'isAutomatc' => 'required',
            'engine' => 'required',
            'numberOfDoors' => 'required|between:2,5'
            ]);

        $car = new Car();
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->maxSpeed = $request->input('maxSpeed');
        $car->isAutomatc = $request->input('isAutomatc');
        $car->engine = $request->input('engine');
        $car->numberOfDoors = $request->input('numberOfDoors');

        $car->save();
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return response()->json(['success' => 'Automobil obrisan']);
    }
}
