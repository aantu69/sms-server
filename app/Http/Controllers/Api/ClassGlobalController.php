<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassGlobal;
use App\Http\Requests\StoreClassGlobalRequest;
use App\Transformers\ClassGlobalTransformer;

class ClassGlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classesGlobal = ClassGlobal::latestFirst()->get();

        return fractal()
            ->collection($classesGlobal)
            ->parseIncludes(['formatGlobal'])
            ->transformWith(new ClassGlobalTransformer)
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
    public function store(StoreClassGlobalRequest $request)
    {
            
        $classGlobal = new ClassGlobal;

        $classGlobal->name = $request->name;
        $classGlobal->format_global_id = $request->format_global_id;

        $classGlobal->save();

        return fractal()
            ->item($classGlobal)
            ->transformWith(new ClassGlobalTransformer)
            ->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClassGlobal $classGlobal){
        return fractal()
    		->item($classGlobal)
    		->transformWith(new ClassGlobalTransformer)
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
