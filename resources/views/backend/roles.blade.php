@extends('layouts.app')

@section('content')

<div class="main-wrapper">

    <!-- Header -->

        @include('backend.header')

    <!-- /Header -->

    <!-- Sidebar -->

        @include('backend.menu')


    <!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome {{ Auth::user()->name }}!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <a href="" class="btn btn-sm btn-success add_role_btn_cls">Add New User Role</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role Name</th>
                        <th scope="col">Role Slug</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody id="allusersdata">



                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

</div>

    {{-- user Add modal start --}}

    <div id="role_modal"  class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add New Student</h4>
                </div>
                <div class="modal-body">
                    <form id="role_form"   action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Role Name</label>
                            <input name="name" placeholder="Name" class="form-control"  type="text">
                        </div>

                        <div class="form-group">
                            <label for="">Permission</label><br>
                            <input  name="per[]"  type="checkbox" id="Teacher"  value="Teacher"   > <label for="Teacher">Teacher</label><br>
                            <input  name="per[]"  type="checkbox" id="Student"  value="Student"   > <label for="Student">Student</label><br>
                            <input  name="per[]" type="checkbox" id="Staff"  value="Staff"   > <label for="Staff">Staff</label><br>
                            <input  name="per[]" type="checkbox" id="Accounts"  value="Accounts"   > <label for="Accounts">Accounts</label><br>
                            <input  name="per[]" type="checkbox" id="Settings"  value="Settings"   > <label for="Settings">Settings</label><br>
                        </div>

                        <div class="form-group">
                            <input class="btn btn-sm btn-success" name="submit"  type="submit" value="Add Role" >
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- user Add modal end --}}
    {{-- user Add modal edit --}}
    <div id="role_edit_modal"  class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Add New Student</h4>
                </div>
                <div class="modal-body">
                    <form id="role_edit_form"   action="" method="POST"  enctype="multipart/form-data"  >
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="name" placeholder="Name" class="form-control"  type="text">
                            <input name="ueditid"  class="form-control"  type="hidden">
                        </div>
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input name="uname" placeholder="Name" class="form-control"  type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" placeholder="Email Address" class="form-control"  type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Cell</label>
                            <input name="cell" placeholder="Phone Number" class="form-control"  type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Photo</label>
                            <input name="photo"  type="file">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-sm btn-success" name="submit"  type="submit" value="Add User" >
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
