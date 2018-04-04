<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GlobalClass;
use App\Http\Requests\StoreClassRequest;
use App\Transformers\ClassTransformer;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $globalClasses = GlobalClass::latestFirst()->get();

        return fractal()
            ->collection($globalClasses)
            ->transformWith(new ClassTransformer)
    		->toArray();
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
    public function store(StoreClassRequest $request)
    {
            
        $globalClass = new GlobalClass;

        $globalClass->name = $request->name;
        $globalClass->class_format_id = $request->class_format_id;

        $globalClass->save();

        return fractal()
            ->item($globalClass)
            ->transformWith(new ClassTransformer)
            ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GlobalClass $globalClass){
        return fractal()
    		->item($globalClass)
    		->transformWith(new ClassTransformer)
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
