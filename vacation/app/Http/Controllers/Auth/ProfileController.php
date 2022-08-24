<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 *
*/
class ProfileController extends Controller
{

      /**
       * Get information authenticated user
       *
       * @param Request $request
       * @return \Illuminate\Http\JsonResponse
      */
      public function index(Request $request)
      {
            $user = $request->user();

            return response()->json([
              'email' => $user->email,
              'name'  => $user->name
           ]);
      }
}
