<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vacations\VacationStoreRequest;
use App\Http\Requests\Vacations\VacationUpdateRequest;
use App\Http\Resources\VacationResource;
use App\Models\Vacation;
use Illuminate\Http\Response;


/**
 *
*/
class VacationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return VacationResource::collection(
            Vacation::orderBy('created_at', 'desc')->get()
        );
    }



    /**
     * @param $userId
     * @return mixed
    */
    public function getVacationByUserId($userId)
    {
         return Vacation::where('user_id', $userId)->get();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param VacationStoreRequest $request
     * @return \Illuminate\Http\Response
    */
    public function store(VacationStoreRequest $request)
    {
         // Получаем id авторизован пользователя, который хочет записаться на отпуск
         $user_id = auth()->id() ?? $request->user_id;

         // объединяем все параметры для создания записи
         $credentials = array_merge($request->validated(), compact('user_id'));

         // создание отпуска
         $vacation = Vacation::create($credentials);

         // возвращаем запись, которая только что создали
         return new VacationResource($vacation);
    }






    /**
     * Display the specified resource.
     *
     * @param  Vacation $vacation
     * @return \Illuminate\Http\Response
    */
    public function show(Vacation $vacation)
    {
         return new VacationResource($vacation);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param VacationUpdateRequest $request
     * @param  Vacation $vacation
     * @return \Illuminate\Http\Response
    */
    public function update(VacationUpdateRequest $request, Vacation $vacation)
    {
         $vacation->update($request->validated());

         return new VacationResource($vacation);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param
     * @return \Illuminate\Http\Response
    */
    public function destroy(Vacation $vacation)
    {
         $vacation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
