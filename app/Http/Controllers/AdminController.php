<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminController
 *
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    public function users()
    {
        $users = DB::table('users')->paginate(10);

        return view(
            'users.index',
            [
                'users' => $users
            ]
        );
    }


/** @param Request $request*/


    public function editUser(Request $request)
    {
      $user = User::find($request->editId);
      $user->role = $request->role;
      $user->save();
      return back();
    }

  /** @param Request $request*/

    public function deleteUser(Request $request){
      $user = User::find($request->deleteId);
      $user->delete();
      return back();
  }

}
