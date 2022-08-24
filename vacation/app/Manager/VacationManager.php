<?php
namespace App\Manager;


use App\Models\Vacation;

/**
 *
*/
class VacationManager
{

    /**
     * @param int $userId
     * @param array $ids
     * @return mixed
    */
    public function removeCollectionByUserId(int $userId, array $ids)
    {
        return \App\Models\Vacation::where('user_id', $userId)
                                     ->whereIn('id', $ids)
                                     ->delete();
    }



    /**
     * @param array $credentials
     * @param array $blackList
     * @return void
    */
    public function saveOnly(array $credentials, array $blackList = [])
    {
          $date_start_at = $credentials['date_start_at'];
          $date_end_at   = $credentials['date_end_at'];
          $user_id       = $credentials['user_id'];

          if (! empty($credentials['id']) && ! in_array($credentials['id'], $blackList)) {

              $id = $credentials['id'];

               /** @var Vacation $vacation */
               $vacation = Vacation::where('id', $id)
                                  ->where('user_id', $user_id)
                                  ->first();

               $vacation->update(
                   compact('user_id', 'date_start_at', 'date_end_at')
               );

            }else{ // если id === null, то создаём новую запись

                Vacation::create(
                    compact('user_id', 'date_start_at', 'date_end_at')
                );
            }
     }



    /**
     * @param string $column
     * @param string $direction
     * @return mixed
    */
    public function getAllOrderedBy(string $column, string $direction = 'desc')
    {
         return $this->makeQueryOrderedBy($column, $direction)->get();
    }



    /**
     * @param string $column
     * @param string $direction
     * @return mixed
    */
    public function makeQueryOrderedBy(string $column, string $direction = 'desc')
    {
         return Vacation::orderBy($column, $direction);
    }
}
