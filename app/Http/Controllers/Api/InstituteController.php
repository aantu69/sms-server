<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Http\Requests\StoreInstituteRequest;
use App\Transformers\InstituteTransformer;


use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutes = Institute::latestFirst()->paginate(1);
        $instCollection = $institutes->getCollection();

        return fractal()
            ->collection($instCollection)
            ->parseIncludes(['users'])
            ->transformWith(new InstituteTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($institutes))
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
    public function store(StoreInstituteRequest $request)
    {
        
        $institute = new Institute;

    	$institute->name = $request->name;
        $institute->short_name = $request->short_name;
        $institute->address = $request->address;
        $institute->email = $request->email;
        $institute->phone = $request->phone;
        $institute->fax = $request->fax;
        $institute->mobile = $request->mobile;
        $institute->website = $request->website;
        $institute->logo = $request->logo;
        $institute->banner = $request->banner;

    	$institute->save();

    	return fractal()
            ->item($institute)
            ->parseIncludes(['users'])
    		->transformWith(new InstituteTransformer)
    		->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
