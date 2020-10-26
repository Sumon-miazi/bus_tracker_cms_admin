<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Bus;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signIn(Request $request)
    {
//return $request->password;
        if(Driver::where('email', $request->email)->exists()){
            $driver = Driver::where('email', $request->email)->first();
            $bus = Bus::find($driver->bus_id);

            $driver->bus_name = $bus->name;
            //return $driver;
            if($driver->password == $request->password){
                $status = true;
                return response()->json(['status' => $status, 'message' => 'sign in successful', 'data' => $driver]);
            }
        }

        $status = false;
        return response()->json(['status' => $status, 'message' => 'sign in is not successful']);
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
