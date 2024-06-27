@extends("Admin.layout")
@section('content')


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Users</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <!-- <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Table-Export</li>
                                </ol>
                            </div>
                        </div>
                    </div> -->
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                    {{-- <a href="{{url('shop-add-user')}}"><button class="btn btn-primary">Add New User</button></a> --}}
                    <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-success">
                        <i class="fa fa-plus"></i> Create New
                      </a>
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Zahid AKbar</td>
                                                    <td>janujakhar2370@gmail.com</td></td>
                                                    <td>Admin</td>
                                                    <td>Active</td>

                                                    <td><a href="#" class="btn btn-danger">InActive</a>
                                                    <a href="#" class="btn btn-success">Active</a></td>
                                                    
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
                <strong>Add a category </strong>
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
                    <label class="control-label">Choose Category Color</label>
                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                      <option value="success">Success</option>
                      <option value="danger">Danger</option>
                      <option value="info">Info</option>
                      <option value="pink">Pink</option>
                      <option value="primary">Primary</option>
                      <option value="warning">Warning</option>
                    </select>
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