<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 *
*/
class LogoutController extends Controller
{

        /**
         * @return Application|ResponseFactory|Response
        */
        public function index()
        {
             auth()->logout();

             return response(null, Response::HTTP_NO_CONTENT);
        }
}
