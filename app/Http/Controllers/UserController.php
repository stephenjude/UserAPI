<?php

namespace App\Http\Controllers;

use App\Traits\CustomResponse;
use App\Transformers\UserTransformer;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    use CustomResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $data = fractal($users, new UserTransformer())->toArray();

        return $this->customData($data, 'users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //validate request 
        $data = request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'string|min:8',
        ]);

        $user = User::create($data);

        $data = fractal($user, new UserTransformer())->toArray();

        return $this->customData($data, 'user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($user = User::find($id))) {
            return $this->notFound('user not found');
        }

        $data = fractal($user, new UserTransformer())->toArray();

        return $this->customData($data, 'user');
    }
}
