<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MediumGlobal;
use App\Http\Requests\StoreMediumGlobalRequest;
use App\Transformers\MediumGlobalTransformer;


class MediumGlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediums = MediumGlobal::latestFirst()->get();

        return fractal()
            ->collection($mediums)
            ->transformWith(new MediumGlobalTransformer)
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
    public function store(StoreMediumGlobalRequest $request)
    {
        $medium = new MediumGlobal;

        $medium->name = $request->name;
        //$medium->user_id = $request->user->id;

    	$medium->save();

    	return fractal()
            ->item($medium)
    		->transformWith(new MediumGlobalTransformer)
    		->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $medium = MediumGlobal::where('id', $id)->first();
        return fractal()
    		->item($medium)
    		->transformWith(new MediumGlobalTransformer)
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
        $medium = MediumGlobal::find($id);
        $medium->name = $request->name;
        //$medium->user_id = $request->user->id;
        $medium->save();

    	return fractal()
            ->item($medium)
    		->transformWith(new MediumGlobalTransformer)
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
        $medium = MediumGlobal::find($id);
        $medium->delete();

        $mediums = MediumGlobal::latestFirst()->get();

        return fractal()
            ->collection($mediums)
            ->transformWith(new MediumGlobalTransformer)
    		->toArray();
    }
}
