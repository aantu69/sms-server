<?php

namespace App\Observers;

//use Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAction;

class UserActionsObserver
{
    public function saved($model)
    {
        if ($model->wasRecentlyCreated == true) {
            // Data was just created
            $action = 'created';
        } else {
            // Data was updated
            $action = 'updated';
        }

        
        if (Auth::check()) { // for normal authentication
            UserAction::create([
                'user_id'      => Auth::user()->id,
                'action'       => $action,
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }

        if (auth()->guard('api')->user()) { // for passport authentication
            UserAction::create([
                'user_id'      => auth()->guard('api')->user()->id,
                'action'       => $action,
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }
        
    }

    public function deleting($model)
    {
        if (Auth::check()) { // for normal authentication
            UserAction::create([
                'user_id'      => Auth::user()->id,
                'action'       => 'deleted',
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }

        if (auth()->guard('api')->user()) { // for passport authentication
            UserAction::create([
                'user_id'      => auth()->guard('api')->user()->id,
                'action'       => 'deleted',
                'action_model' => $model->getTable(),
                'action_id'    => $model->id
            ]);
        }
    }
}