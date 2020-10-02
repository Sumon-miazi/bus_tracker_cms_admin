<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAllBuses()
    {
        $buses = Bus::all();

        foreach ($buses as $bus){
            //echo $bus->busStop;
            foreach ($bus->busStoppages as $stoppage) {
              //  echo  $stoppage;
            }
            
        }

        $status = true;
        return response()->json(['status' => $status, 'message' => 'Bus found', 'data' => $buses]);
    }


    public function busLocationById(Request $request)
    {
        if(Bus::where('id', $request->bus_id)->exists()){
            $bus = Bus::where('id', $request->bus_id)->first();
            $status = true;
            return response()->json(['status' => $status, 'message' => 'Bus found', 'data' => $bus]);
        }

        $status = false;
        return response()->json(['status' => $status, 'message' => 'Bus not found']);
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
        if(Bus::where('id', $request->bus_id)->exists()){
            $bus = Bus::find($request->bus_id);

            $bus->lat = $request->get('lat');
            $bus->long = $request->get('long');

            $bus->save();
            $status = true;
            return response()->json(['status' => $status, 'message' => 'Bus location updated successfully', 'data' => $bus]);
        }

        $status = false;
        return response()->json(['status' => $status, 'message' => 'Bus not found']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Bus $bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bus $bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
