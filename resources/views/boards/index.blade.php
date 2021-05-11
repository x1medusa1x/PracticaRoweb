@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Boards</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bordered Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>User Id</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($boards as $board)
                            <tr>
                                <td>{{$board->id}}</td>
                                <td>{{$board->name}}</td>
                                <td>{{$board->user_id}}</td>

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-primary" type="button" data-board="{{json_encode($board)}}" data-toggle="modal" data-target="#editBoard-modal">
                                            <i class="fas fa-edit"></i></button>
                                        <button class="btn btn-xs btn-danger" type="button" data-board="{{json_encode($board)}}" data-toggle="modal" data-target="#deleteBoard-modal">
                                            <i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    @if ($boards->currentPage() > 1)
                        <li class="page-item"><a class="page-link" href="{{$boards->previousPageUrl()}}">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="{{$boards->url(1)}}">1</a></li>
                    @endif

                    @if ($boards->currentPage() < $boards->lastPage() )
                        <li class="page-item"><a class="page-link" href="{{$boards->url($boards->lastPage())}}">{{$boards->lastPage()}}</a></li>
                        <li class="page-item"><a class="page-link" href="{{$boards->nextPageUrl()}}">&raquo;</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /.card -->

        <div class="modal fade" id="editBoard-modal" >
            <div class="modal-dialog">
                <form action="" method="POST" name = "selectedboard" value = "">
                  @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit board</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="editName"></div>
                            <input type="hidden" name="editId" value="" />
                            <div class="form-group">
                                <label for="editRole">To be continued...</label>
                                <!-- <select class="custom-select rounded-0" id="editRole" name = "role" >
                                    <option value="{{\App\Models\User::ROLE_USER}}">User</option>
                                    <option value="{{\App\Models\User::ROLE_ADMIN}}">Admin</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

                <div class="modal fade" id="deleteBoard-modal">
                    <div class="modal-dialog">
                      <form action="{{route('DeleteBoard', 'deleteBoardId')}}" method="POST" id = "deleteBoard">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delete Board</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div>Are you sure you want to delete this entry? (to be continued....)</div>
                                <input type="hidden" name="deleteBoardId" id = "deleteBoardId" />
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                      </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>

    </section>
    <!-- /.content -->
@endsection
