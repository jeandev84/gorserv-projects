<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 *
*/
class LoginController extends Controller
{

      /**
       * @param Request $request
       * @return Application|ResponseFactory|JsonResponse|Response
      */
      public function index(Request $request)
      {
           if (! $token = auth()->attempt($request->only('email', 'password'))) {
               return response(null, Response::HTTP_UNAUTHORIZED);
           }

           return response()->json(compact('token'));
      }
}
