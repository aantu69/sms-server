<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassFormat;
use App\Http\Requests\StoreClassFormatRequest;
use App\Transformers\ClassFormatTransformer;

class ClassFormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classFormats = ClassFormat::latestFirst()->get();

        return fractal()
            ->collection($classFormats)
            ->parseIncludes(['globalClasses'])
            ->transformWith(new ClassFormatTransformer)
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
    public function store(StoreClassFormatRequest $request)
    {
        $classFormat = new ClassFormat;

    	$classFormat->name = $request->name;

    	$classFormat->save();

    	return fractal()
            ->item($classFormat)
            ->parseIncludes(['globalClasses'])
    		->transformWith(new ClassFormatTransformer)
    		->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClassFormat $classFormat){
        return fractal()
            ->item($classFormat)
            ->parseIncludes(['globalClasses'])
    		->transformWith(new ClassFormatTransformer)
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
