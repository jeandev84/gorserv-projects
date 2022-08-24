<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vacation\VacationStoreRequest;
use App\Http\Requests\Vacation\VacationUpdateRequest;
use App\Models\VacationApproval;
use Illuminate\Http\Response;


/**
 *
*/
class VacationApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacationStoreRequest $request)
    {
        // TODO implements
    }



    /**
     * Display the specified resource.
     *
     * @param VacationApproval $vacationApproval
     * @return Response
    */
    public function show(VacationApproval $vacationApproval)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param VacationUpdateRequest $request
     * @param VacationApproval $vacationApproval
     * @return Response
     */
    public function update(VacationUpdateRequest $request, VacationApproval $vacationApproval)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param VacationApproval $vacationApproval
     * @return Response
    */
    public function destroy(VacationApproval $vacationApproval)
    {
        //
    }
}
