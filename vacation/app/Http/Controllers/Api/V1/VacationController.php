<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacationStoreRequest;
use App\Http\Requests\VacationUpdateRequest;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // TODO implements
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param VacationStoreRequest $request
     * @return \Illuminate\Http\Response
    */
    public function store(VacationStoreRequest $request)
    {
        // TODO implements
    }




    /**
     * Display the specified resource.
     *
     * @param  Vacation $vacation
     * @return \Illuminate\Http\Response
     */
    public function show(Vacation $vacation)
    {
        // TODO implements
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
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param
     * @return \Illuminate\Http\Response
    */
    public function destroy(Vacation $vacation)
    {
        //
    }
}
