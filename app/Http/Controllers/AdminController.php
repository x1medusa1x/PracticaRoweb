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
      $role = $request->get('role');
      $user_id = $request->get('id');
      dd($role);
      #DB::update('update users set name = ? where id = ?',[$role,$user_id]);
      //return redirect(route('users.all'));
    }
}
