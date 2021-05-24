@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">


                <div class="row">
                    <div class="col-lg-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @if($user->role === \App\Models\User::ROLE_ADMIN)
                                  <h3>{{count($boards)}}</h3>
                                @else
                                  <h3>{{count($userBoards)}}</h3>
                                @endif
                                <p>Number of Boards</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{route('boards.all')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-12">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">

                              @if($user->role === \App\Models\User::ROLE_ADMIN)
                                <h3>{{$tasks}}</h3>
                                <p>Number of total tasks</p>
                              @else
                                <h3>{{$userNoTasks}}</h3>
                                <p>Number of assigned tasks</p>
                              @endif


                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <button  class="btn col-lg-12 small-box-footer" type="button" data-toggle="modal" data-target="#moreInfoModal">More info <i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- ./col -->
                </div>


            </div>
        </div>
        <!-- /.card -->
        <div class="modal fade" id="moreInfoModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      @if($user->role === \App\Models\User::ROLE_ADMIN)
                        <h4 class="modal-title">Personal Assigned Tasks</h4>
                      @else
                        <h4 class="modal-title">Assigned Tasks</h4>
                      @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div style = >
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>Task Name</th>
                                    <th>Board ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userTasks as $task)
                                    <tr>
                                        <td>{{$task[0]}}</td>
                                        <td>{{$task[1]}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
