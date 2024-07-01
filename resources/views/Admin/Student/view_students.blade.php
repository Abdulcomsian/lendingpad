@extends("Admin.layout")
@section('content')


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>All Students</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                    <a href="#" data-toggle="modal" data-target="#add-category"><button class="btn btn-primary">Create Student</button></a>
                    <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr#</th>
                                                    <th>Category Name</th>
                                                    <th>Optional</th>
                                                    <th>Publication Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Zahid AKbar</td>
                                                    <td>Laravel</td>

                                                    <td>
                                                        <a href="#" class="btn btn-danger">InActive</a>
                                                        <a href="#" class="btn btn-success">Active</a>
                                                    </td>

                                                    <td>
                                                        {{-- <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#add-category"><i class="ti-eye"></i></a> --}}
                                                        <a href="#" class="btn btn-info"><li class="ti-pencil-alt"></li></a>
                                                        <a href="#" class="btn btn-danger" onclick="return confirm('Do You want to Delete Script?')"><i class="ti-trash"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                                @if(!empty($allUsers))
                                                @foreach($allUsers as $user)
                                                <tr>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->role}}</td>

                                                    @if($user->status == "1")
                                                        <td>Active</td>
                                                    @else
                                                        <td>In-Active</td>
                                                    @endif

                                                    @if($user->status == "1")
                                                        <td><a href="update-user-status/{{$user->id}}/0" class="btn btn-danger">InActive</a></td>
                                                    @else
                                                        <td><a href="update-user-status/{{$user->id}}/1" class="btn btn-success">Active</a></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>


    

    <!-- Modal Add Category -->
    <div class="modal fade none-border" id="add-category">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
              <h4 class="modal-title">
                <strong>Add New Category</strong>
              </h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">Category Name</label>
                        <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Optional</label>
                        <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                    </div>

                    <div class="col-md-6">
                        <label class="control-label">Publication Status</label>
                        <input type="checkbox" name="category-name" />
                    </div>

                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
            </div>
          </div>
        </div>
      </div>
      <!-- END MODAL -->

      
@endsection