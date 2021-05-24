<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        $boards = Board::with(['user', 'boardUsers']);

        if ($user->role === User::ROLE_USER) {
            $boards = $boards->where(function ($query) use ($user) {
                //Suntem in tabele de boards in continuare
                $query->where('user_id', $user->id)
                    ->orWhereHas('boardUsers', function ($query) use ($user) {
                        //Suntem in tabela de board_users
                        $query->where('user_id', $user->id);
                    });
            });
        }
        $totalBoards = $boards->count();
        $tasks = 0;
        $eachUserNoOfTasks = 0;
        $eachuserTasks = array();
        $boards = $boards->paginate($totalBoards);
        foreach($boards as $board){
          $tasks = $tasks + count($board->tasks()->paginate($board->tasks()->count()));
          $boardTasks = $board->tasks()->paginate($board->tasks()->count());
           foreach($boardTasks as $task){
             if($task->assignment === $user->id){
              $eachUserNoOfTasks = $eachUserNoOfTasks + 1;
              $eachuserTasks[] = [$task->name, $board->id];
            }
           }
        }
        $userBoards = Board::where('user_id', $user->id)->get()->toArray();
        return view('dashboard.index',
                    [
                      'boards' => $boards,
                      'userBoards' => $userBoards,
                      'tasks' =>$tasks,
                      'userNoTasks' => $eachUserNoOfTasks,
                      'userTasks' => $eachuserTasks,
                      'userList' => User::select(['id', 'name'])->get()->toArray()
                    ]);
    }

}
