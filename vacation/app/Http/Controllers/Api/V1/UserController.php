<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
     * Получить список всех пользователей
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
         return UserResource::collection(
             User::orderBy('created_at', 'desc')->get()
         );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        // TODO implements
    }




    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
    */
    public function show(User $user)
    {
         // TODO implements
    }



    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param User $user
     * @return Response
    */
    public function update(UserUpdateRequest $request, User $user)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
    */
    public function destroy(User $user)
    {
        //
    }
}
