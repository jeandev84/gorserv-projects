<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vacations\VacationStoreRequest;
use App\Http\Requests\Vacations\VacationUpdateRequest;
use App\Http\Resources\VacationApprovalResource;
use App\Manager\VacationManager;
use App\Models\Vacation;
use App\Models\VacationApproval;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 *
*/
class VacationApprovalController extends Controller
{

      /**
       * @var VacationManager
      */
     protected $vacationManager;


     /**
      * @param VacationManager $vacationManager
     */
     public function __construct(VacationManager $vacationManager)
     {
          $this->vacationManager = $vacationManager;
     }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
         // TODO pagination something like
         // TODO Vacation::orderBy('created_at', 'desc')->paginate(VacationApproval::perPage)
         return VacationApprovalResource::collection(
              Vacation::orderBy('created_at', 'desc')->get()
         );
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param VacationStoreRequest $request
     * @return Response
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

        /*
            [
              'user_id' => int,
              'updates' => [
                  [
                    'id' => null | int,  // из таблицы отпусков - добавить новую строку или обновить имеющуюся,
                    'date_start_at' => date:Y-m-d,
                    'date_end_at' => date:Y-m-d,
                  ],
                  [
                    'id' => null | int,  // из таблицы отпусков - добавить новую строку или обновить имеющуюся,
                    'date_start_at' => date:Y-m-d,
                    'date_end_at' => date:Y-m-d,
                  ],
                ],
                'agreed_by_id' => 37,
                'deletes' => [int, int, ....]  // id записей, которые надо удалить
              ];
           */

           $user_id = $request->user_id;

           // Удаляем все записи из списка "deletes"
           if ($ids = $request->deletes) {
                $this->vacationManager->removeCollectionByUserId($user_id, $ids);
           }


           // Обновляем или создаем отпуски для user_id
           if($vacations = $request->updates) {
                foreach ($vacations as $credentials) {
                   // $credentials = array_merge($credentials, compact('user_id'));
                   $this->vacationManager->saveOnly($credentials, $request->deletes);
                }
           }

           $vacationApproval->update($request->only('user_id', 'agreed_by_id'));

           return new VacationApprovalResource($vacationApproval);
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




    /**
     * @return array
    */
    public function getResultApprovals(): array
    {
         return VacationApproval::RESULTS;
    }



    public function approve(Request $request)
    {
        // TODO  Refactoring may be later
        /*
          'id' : ID Согласование отпуска
          'vacation_id' : ID отпуска
          'result_approval' : Результат согласования
        */

        $id = $request->id;

        $vacation = Vacation::find($request->vacation_id);

        if (! $vacation) {
             return \response()->json([
                 'status' => false,
                 'message' => sprintf('Не найден отпуск с идентификатором (%s)', $id)],
                 Response::HTTP_BAD_REQUEST
             );
        }

        $vacationApproval = VacationApproval::where('id', $request->id)->first();

        $credentials = [
            'user_id'         => $vacation->user_id,
            'vacation_id'     => $vacation->id,
            'result_approval' => $request->result_approval,
            'agreed_by_id'    => auth()->id()
        ];

        // VacationApproval::where('id', $request->id)->update($credentials);

        $vacationApproval->update($credentials);


        return new VacationApprovalResource($vacationApproval);
    }

}
