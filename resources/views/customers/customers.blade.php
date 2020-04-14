@extends('layouts.master')

@section('title') Starter Page @endsection

@section('body')
<body data-topbar="dark" data-sidebar="light">
@endsection
@section('content')

<button class="btn btn-primary mt-1" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Add New User
</button>
<button class="btn btn-primary mt-1" type="button" data-toggle="collapse" data-target="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse">
    Search User
</button>
</p>
<div class="collapse" id="searchCollapse">
    <div class="card card-body mb-0">
        <div class="card bg-light text-white-50">
            <div class="card-body">
                
               <form action="{{ route('users-search') }}" method="GET">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 col-xl-5 col-sm-5">
                        <input class="form-control" type="text"name="user_search" id="user_search" placeholder="Search for User">
                    </div>
             
                    <div class="col-md-2 col-xl-2 col-sm-12">
   
                        <button type="submit" class="btn btn-success waves-effect waves-light btn-block">
                            <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Search User
                        </button>
                    </div>
                </div>
               </form>
                
            </div>
        </div>
    </div>
</div>    
<div class="collapse" id="collapseExample">
<div class="card card-body mb-0">
    <div class="row">
        <div class="col-xl-12">
         <div class="card bg-light text-white-50">
             <div class="card-body">
                 
                <form action="{{ route('users') }}" method="POST">
                 @csrf
                 <div class="form-group row">
                     <div class="col-md-12 col-xl-12 col-sm-12 mb-3">
                         <input class="form-control" type="text" value="" id="add_user_fname" name="add_user_fname" placeholder="Enter First Name">
                     </div>
                     <div class="col-md-12 col-xl-12 col-sm-12 mb-3">
                         <input class="form-control" type="text" value="" id="add_user_lname" name="add_user_lname" placeholder="Enter Last Name">
                     </div>
                     <div class="col-md-12 col-xl-12 col-sm-12 mb-3">
                        <input class="form-control" type="email" value="" id="add_user_email" name="add_user_email" placeholder="Enter Email">
                    </div>
                    <div class="col-md-12 col-xl-12 col-sm-12 mb-3">
                        <input class="form-control" type="password" value="" id="add_user_password" name="add_user_password" placeholder="Enter Password">
                    </div>
                    <div class="col-md-12 col-xl-12 col-sm-12 mb-3">
                        <input class="form-control" type="text" value="" id="add_user_mobile" name="add_user_mobile" placeholder="Enter Mobile Phone">
                    </div>
                     <div class="col-md-12 col-xl-12 col-sm-12 mb-3">
    
                         <button type="submit" class="btn btn-success waves-effect waves-light btn-block">
                             <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Add User 
                         </button>
                     </div>
                 </div>
                </form>
                 
             </div>
         </div>
         

        </div>
    </div>
</div>
</div>

                        <div class="row mt-4">
                            @forelse ($users as $user)
                            <div class="col-md-6 col-xl-4 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="card-body">
                                        <span class="button-spans">
                                            <span class="span-edit" data-user-id="{{ $user->id }}">
                                                <i class="mdi mdi-comment-edit text-primary"></i>
                                            </span>
                                            <span class="span-delete" data-user-id="{{ $user->id }}">
                                                <i class="mdi mdi-delete text-danger"></i></span>
                                               
                                            </span>
                                        <div class="media">
                                            <div class="avatar-md mr-4">
                                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                    <img class="rounded-circle" src="{{ URL::asset('storage/images/'.$user->profile_image) }}"  alt="" width="62" height="62">
                                                </span>
                                            </div>

                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15"><a href="{{ route('users-profile',['id' => $user->id]) }}" class="text-dark">{{ $user->first_name }} {{ $user->last_name }}</a></h5>
                                                <p class="text-muted mb-4">{{ $user->email }}</p>
                                                <p class="text-muted mb-4">{{ $user->mobile }}</p>
                                                <p class="text-muted mb-4">{{ (is_null($user->shippingAddress)) ? 'No Address Assigned ,Please Update to Put New Address' : $user->shippingAddress->completed() }}</p>
                                               
                                                   @foreach ($user->roles as $role)
                                                    
                                                        @if ($role->role == 'laborum')
                                                        <li class="list-inline-item mr-3">
                                                            <span class="badge badge-danger">Admin</span>
                                                        </li>
                                                        @endif
                                                        @if ($role->role == 'quod')
                                                        <li class="list-inline-item mr-3">
                                                            <span class="badge badge-success">Customer</span>
                                                        </li>
                                                        @endif
                                                        @if ($role->role == 'explicabo')
                                                        <li class="list-inline-item mr-3">
                                                            <span class="badge badge-info">Support</span>
                                                        </li>
                                                        @endif
                                                   
                                                   @endforeach
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Register Date">
                                                <i class= "bx bx-calendar mr-1"></i> {{ $user->created_at->diffForHumans() }}
                                            </li>
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Spend">
                                                <i class= "bx bx-money mr-1"></i> 214
                                            </li>
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Items Sold">
                                                <i class= "bx bx-cart-alt mr-1"></i> 214
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            
                                @empty
                                    No User Found !
                                @endforelse
                               
                             
                        </div>
                        <div class="row justify-content-center align-items-center">
                            {{ ($pagState) ? $users->links() : '' }}
                        </div>


   {{-- modal for update unit --}}
    <div id="edit-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Assign Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="container">
                       <form action="{{ route('users') }}" method="POST">
                           @csrf
                           @method('PUT')
                         
                           <div class="form-group row">
                            <label class="col-md-2 col-form-label">Select</label>
                            <div class="col-md-10">
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Large select</option>
                                    <option>Small select</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="unit_id_modal" id="unit_id_modal">
                            <button type="submit" class="btn btn-outline-success btn-block waves-effect waves-light">Update Unit</button>                        
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
                        <h5 class="modal-title mt-0" id="mySmallModalLabel">Delete Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <div class="container">
                           <form action="{{ route('users') }}" method="POST">
                               @csrf
                               @method('DELETE')
                            <p>Do You Confirm Deleting This User ?</p>
                            <div class="row">
                                <input type="hidden" name="user_id_delete" id="user_id_delete">
                                <button type="submit" class="btn btn-outline-danger btn-block waves-effect waves-light">Delete User</button>                        
                            </div>
                           </form>
                       </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

@endsection

@section('script')
    @if (Session::has('message'))
    <script>
        toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
        toastr.success("{{ Session::get('message') }}");
        // console.log('test');
    </script>
    @endif

    <script>
        $(document).ready(function(){
            var $editButton = $('.span-edit');
                        var $deleteButton = $('.span-delete');
                   
                        var $editModal = $('#edit-modal');
                        var $editId  = $('#unit_id_modal');


                        $editButton.on('click',function(e){
                            e.preventDefault();
                            var unitid   = $(this).data('user-id'); 
                            var streetNbr = $(this).data('user-street-nbr');
                            var streetName = $(this).data('user-street-name');
                            var state = $(this).data('user-state');
                            var city = $(this).data('user-city');
                            var country = $(this).data('user-country');
                            var poste = $(this).data('user-poste');
                            var user_roles = $(this).data('user-role');
                            console.log(unitid+' '+unitName+' '+unitCode);

                            $('#unit_name_modal').val(unitName);
                            $('#unit_code_modal').val(unitCode);
                            $('#unit_id_modal').val(unitid);
                            $editModal.modal('show');

                        });

                        var $deleteModal = $('#delete-modal');
                        var $deleteId  = $('#user_id_delete');

                        $deleteButton.on('click',function(e){
                            e.preventDefault();
                            var userid = $(this).data('user-id'); 
                            $deleteId.val(userid);
                            $deleteModal.modal('show');
                        });
        });
    </script>
    
    
@endsection

