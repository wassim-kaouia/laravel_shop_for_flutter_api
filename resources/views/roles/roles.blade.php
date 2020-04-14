@extends('layouts.master')

@section('title')
Light Sidebar
@endsection


@section('body')
<body data-topbar="dark" data-sidebar="light">
@endsection

@section('content')
@if (session()->has('status'))
<h2 class="alert alert-danger">{{ session()->get('status') }}</h2>
{{-- {{ toast(session()->get('status'),'success') }} --}}
@endif
 
   <div class="row">
       <div class="col-xl-12">
        <div class="card bg-light text-white-50">
            <div class="card-body">
                
               <form action="{{ route('roles') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 col-xl-5 col-sm-5">
                        <input class="form-control" type="text" value="" id="add_role_name" name="add_role_name" placeholder="Enter a Role Name">
                    </div>
          
                    <div class="col-md-2 col-xl-2 col-sm-12">

                        <button type="submit" class="btn btn-success waves-effect waves-light btn-block">
                            <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Add Role
                        </button>
                    </div>
                </div>
               </form>
                
            </div>
        </div>

        <div class="card bg-light text-white-50">
            <div class="card-body">
                
               <form action="{{ route('roles-search') }}" method="GET">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 col-xl-5 col-sm-5">
                        <input class="form-control" type="text"name="role_name_search" id="role_name_search" placeholder="Search for Role">
                    </div>
             
                    <div class="col-md-2 col-xl-2 col-sm-12">

                        <button type="submit" class="btn btn-success waves-effect waves-light btn-block">
                            <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Search Role
                        </button>
                    </div>
                </div>
               </form>
                
            </div>
        </div>
       </div>
   </div>

   <div class="row">
       @forelse ($roles as $role)
       <div class="col-lg-4">
        <div class="card bg-info text-white-50">
            <div class="card-body">
                <span class="button-spans">
                    <span class="span-edit" data-role-id="{{ $role->id }}" data-role-name="{{ $role->role }}">
                        <i class="mdi mdi-comment-edit text-light"></i>
                    </span>
                    <span class="span-delete" data-role-id="{{ $role->id }}">
                        <i class="mdi mdi-delete text-light"></i></span>
                        <form action="{{ route('roles') }}" method="GET">
                           @csrf
                           @method('DELETE')
                           <input type="hidden" name="">
                        </form>
                    </span>
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-alert-circle-outline mr-3"></i>Role : {{ $role->role }}</h5>
                
            </div>
        </div>
    </div>
    @empty
    <p>No Role Found !</p>
    @endforelse     
   </div>
   <div class="row justify-content-center align-items-center">
       {{ ($pagState) ? $roles->links() : '' }}
   </div>


   {{-- modal for update unit --}}
    <div id="edit-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Update Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="container">
                       <form action="{{ route('roles') }}" method="POST">
                           @csrf
                           @method('PUT')
                           <div class="row mb-3">
                            <label for="unit_name_modal">Role Name:</label>
                            <input  class="form-control" type="text" id="role_name_modal" name="role_name_modal">
                        </div>

                        <div class="row">
                            <input type="hidden" name="role_id_modal" id="role_id_modal">
                            <button type="submit" class="btn btn-outline-success btn-block waves-effect waves-light">Update Role</button>                        
                        </div>
                       </form>
                   </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

       {{-- modal for delete unit --}}
       <div id="delete-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Delete Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="container">
                       <form action="{{ route('roles') }}" method="POST">
                           @csrf
                           @method('DELETE')
                        <p>Do you want really delete this Role ?</p>
                        <div class="row">
                            <input type="hidden" name="role_id_delete" id="role_id_delete">
                            <button type="submit" class="btn btn-outline-danger btn-block waves-effect waves-light">Delete Role</button>                        
                        </div>
                       </form>
                   </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

 @endsection

                @section('script')

                <script>

                    $(document).ready(function(){
                        var $editButton = $('.span-edit');
                        var $deleteButton = $('.span-delete');
                   
                        var $editModal = $('#edit-modal');
                        var $editId  = $('#role_id_modal');


                        $editButton.on('click',function(e){
                            e.preventDefault();
                            var roleid   = $(this).data('role-id'); 
                            var roleName = $(this).data('role-name');
                       

                            $('#role_name_modal').val(roleName);
                            $('#role_id_modal').val(roleid);
                            $editModal.modal('show');

                        });

                        var $deleteModal = $('#delete-modal');
                        var $deleteId  = $('#role_id_delete');

                        $deleteButton.on('click',function(e){
                            e.preventDefault();
                            var roleid = $(this).data('role-id'); 
                            $deleteId.val(roleid);
                            $deleteModal.modal('show');
                        });
                    });
                </script>
                        <!-- Plugin Js-->
                        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

                        <script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>
                  
                @endsection