<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShiftGlobal;
use App\Http\Requests\StoreShiftGlobalRequest;
use App\Transformers\ShiftGlobalTransformer;

class ShiftGlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shiftGlobals = ShiftGlobal::latestFirst()->get();

        return fractal()
            ->collection($shiftGlobals)
            ->transformWith(new ShiftGlobalTransformer)
    		->toArray();
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
    public function store(StoreShiftGlobalRequest $request)
    {
        $shiftGlobal = new ShiftGlobal;

    	$shiftGlobal->name = $request->name;

    	$shiftGlobal->save();

    	return fractal()
            ->item($shiftGlobal)
    		->transformWith(new ShiftGlobalTransformer)
    		->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $shiftGlobal = ShiftGlobal::where('id', $id)->first();
        return fractal()
    		->item($shiftGlobal)
    		->transformWith(new ShiftGlobalTransformer)
    		->toArray();
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
    public function update(Request $request, $id)
    {
        $shiftGlobal = ShiftGlobal::find($id);
        $shiftGlobal->name = $request->name;
        $shiftGlobal->save();

    	return fractal()
            ->item($shiftGlobal)
    		->transformWith(new ShiftGlobalTransformer)
    		->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
