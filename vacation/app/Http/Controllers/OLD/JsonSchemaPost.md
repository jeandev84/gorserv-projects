```
/ TODO Refactoring and clean up code.
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

```
