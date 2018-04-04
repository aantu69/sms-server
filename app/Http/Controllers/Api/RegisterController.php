<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Transformers\UserTransformer;

class RegisterController extends Controller
{
    function __construct()
    {
        $view = 'user-view'; $create = 'user-create'; $edit = 'user-edit';

        $this->middleware('permission:'.$create, ['only' => ['register']]);
        //$this->middleware('permission:'.$view, ['only' => ['index']]);
        //$this->middleware('permission:'.$create, ['only' => ['create', 'store']]);
        //$this->middleware('permission:'.$edit, ['only' => ['edit', 'update']]);
    }

    public function show(User $user){
        return fractal()
    		->item($user)
    		->transformWith(new UserTransformer)
    		->toArray();
    }

    public function register(StoreUserRequest $request){

    	$user = new User;

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);

    	$user->save();

    	return fractal()
    		->item($user)
    		->transformWith(new UserTransformer)
    		->toArray();

    }
}
