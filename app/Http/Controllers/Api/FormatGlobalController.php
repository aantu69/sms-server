<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FormatGlobal;
use App\Http\Requests\StoreFormatGlobalRequest;
use App\Transformers\FormatGlobalTransformer;

class FormatGlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formatGlobal = FormatGlobal::latestFirst()->get();

        return fractal()
            ->collection($formatGlobal)
            ->parseIncludes(['classesGlobal'])
            ->transformWith(new FormatGlobalTransformer)
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
    public function store(StoreFormatGlobalRequest $request)
    {
        $formatGlobal = new FormatGlobal;

    	$formatGlobal->name = $request->name;

    	$formatGlobal->save();

    	return fractal()
            ->item($formatGlobal)
            ->parseIncludes(['classesGlobal'])
    		->transformWith(new FormatGlobalTransformer)
    		->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FormatGlobal $formatGlobal){
        return fractal()
            ->item($formatGlobal)
            ->parseIncludes(['classesGlobal'])
    		->transformWith(new FormatGlobalTransformer)
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
        //
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
