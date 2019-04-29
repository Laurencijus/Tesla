<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;
use Validator;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Truck::all();

        return view('truck.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truck.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'maker' => ['required', 'min:3', 'max:255'],
                'plate' => ['required', 'regex:/^[A-Z]{3}\-\d{3}$/'],
                'make_year' => ['required', 'integer', 'min:1970', 'max:2100'],
                'mechanic_notices' => ['required'],
                'mechanic_id' => ['required', 'integer'],
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('truck.create')->withErrors($validator);
        }

        $truck = new Truck;
        $truck->maker = $request->maker;
        $truck->plate = $request->plate;
        $truck->make_year = $request->make_year;
        $truck->mechanic_notices = $request->mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();

        return redirect()->route('truck.index')->with('success_message', 'Truck ' . $truck->maker . ' ' . $truck->plate . ' was added to garage!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        return view('truck.show', ['truck' => $truck]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        return view('truck.edit', ['truck' => $truck]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {

        $validator = Validator::make($request->all(),
            [
                'maker' => ['required', 'min:3', 'max:255'],
                'plate' => ['required', 'regex:/^[A-Z]{3}\-\d{3}$/'],
                'make_year' => ['required', 'integer', 'min:1970', 'max:2100'],
                'mechanic_notices' => ['required'],
                'mechanic_id' => ['required', 'integer'],
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('truck.edit', [$truck])->withErrors($validator);
        }

        $truck->maker = $request->maker;
        $truck->plate = $request->plate;
        $truck->make_year = $request->make_year;
        $truck->mechanic_notices = $request->mechanic_notices;
        $truck->mechanic_id = $request->mechanic_id;
        $truck->save();

        return redirect()->route('truck.index')->with('success_message', 'Truck ' . $truck->maker . ' ' . $truck->plate . ' was edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
        return redirect()->route('truck.index')->with('success_message', 'Truck ' . $truck->maker . ' ' . $truck->plate . ' was removed from garage!');
    }
}
