<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

/**
 * Class BoardsController
 *
 * @package App\Http\Controllers
 */
class BoardsController extends Controller
{
    /**
     * @return Application|Factory|View
     */

    public function boards(){
      $boards = DB::table('boards')->paginate(10);
      return view(
          'boards.index',
          [
              'boards' => $boards
          ]
      );
    }
}
