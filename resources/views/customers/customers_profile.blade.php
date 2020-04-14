@extends('layouts.master')

@section('title') Starter Page @endsection

@section('body')
<body data-topbar="dark" data-sidebar="light">
@endsection

@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card overflow-hidden">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Profile Page :</h5>
                            <p>Personal Information </p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <form action="{{route('users-image',['id' => $users->id]) }}" id="user-form-image"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <img style="width:62px;height:62px;overflow:hidden" id="image-user" src="{{ URL::asset('storage/images/'.$users->profile_image) }}" alt="" class="img-thumbnail rounded-circle">
                                <input type="file" id="profile_pic" onchange="doAfterSelectImage(this)" style="display:none;">
                                {{-- <div id="edit_profile_button">
                                    <a href="#" class="text-danger">Edit Avatar</a>
                                </div> --}}
                            </form>
                        </div>
                        <h5 class="font-size-15 text-muted">{{ $users->first_name }} {{ $users->last_name }}</h5>
                        <p class="text-muted mb-0 text-truncate">
                            @foreach ($users->roles as $role)
                               Role : {{ $role->role }}
                            @endforeach
                        </p>
                    </div>

                    <div class="col-sm-8">
                        <div class="pt-4">

                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">1298</h5>
                                    <p class="text-muted mb-0">Items Bought</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">$12425.21</h5>
                                    <p class="text-muted mb-0">Total Spent</p>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="px-4 py-3 border-top">
                                    <ul class="list-inline mb-0">

                                        <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Registering Date">
                                            <i class= "bx bx-calendar mr-1"></i> {{ $users->created_at->diffForHumans() }}
                                        </li>
                                        <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reviews">
                                            <i class= "bx bx-comment-dots mr-1"></i> 214
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- shipping timeline / tracking  --}}
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Last Order :</h4>
                <div class="">
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="media">
                                <div class="mr-3">
                                    <i class="bx bx-copy-alt h2 text-primary"></i>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <h5>Ordered</h5>
                                        <p class="text-muted">New common language will be more simple and regular than the existing.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="media">
                                <div class="mr-3">
                                    <i class="bx bx-package h2 text-primary"></i>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <h5>Packed</h5>
                                        <p class="text-muted">To achieve this, it would be necessary to have uniform grammar.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list active">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                            </div>
                            <div class="media">
                                <div class="mr-3">
                                    <i class="bx bx-car h2 text-primary"></i>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <h5>Shipped</h5>
                                        <p class="text-muted">It will be as simple as Occidental in fact, it will be Occidental..</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx-right-arrow-circle"></i>
                            </div>
                            <div class="media">
                                <div class="mr-3">
                                    <i class="bx bx-badge-check h2 text-primary"></i>
                                </div>
                                <div class="media-body">
                                    <div>
                                        <h5>Delivered</h5>
                                        <p class="text-muted">To an English person, it will seem like simplified English.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


{{-- fields for user  --}}

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                
               <div class="mb-4">
                <h4 class="card-title mb-3">Profile Image</h4>

                <form action="{{ route('users-image',['id' => $users->id]) }}" id="mydropzone" method="post" class="dropzone">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dz-message needsclick">
                        <div class="mb-3 text-center">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>
                        
                        <h4 class="">Drop Profile Image here or click to upload.</h4>
                    </div>
                </form>
               </div>
                
                <form action="{{ route('users') }}" method="POST">
                    @csrf
                    @method('PUT')

        

                    <h4 class="card-title mb-4">Update Informations :</h4>
                    
                    <div class="form-group row mb-4">
                        <label for="first_name" class="col-form-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                            <input id="first_name" name="first_name" type="text" class="form-control" value="{{ $users->first_name }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Last Name</label>
                        <div class="col-lg-10">
                            <input  name="last_name" id="last_name" type="text" class="form-control" value="{{ $users->last_name }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="email" class="col-form-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input id="email" name="email" type="email" class="form-control" value="{{ $users->email }}" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="password" class="col-form-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input id="password" name="password" type="password" class="form-control" placeholder="New Password" required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="passwor_confirmation" class="col-form-label col-lg-2">Password Confirmation</label>
                        <div class="col-lg-10">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Retype New Password"  required>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="mobile" class="col-form-label col-lg-2">Mobile Phone</label>
                        <div class="col-lg-10">
                            <input id="mobile" name="mobile" type="text" class="form-control" value="{{ $users->mobile }}" required>
                        </div>
                    </div>


                    <div class="form-group row mb-4">
                        <label for="role" class="col-form-label col-lg-2">Role</label>
                        <div class="col-lg-10">
                            
                            <select name="role-option"  class="form-control">
                                @foreach ($users->roles as $role)
                                    <option disabled>Current: {{ $role->role }}</option>
                                @endforeach
                                @foreach ($roles as $role)
                                    <option value="{{ $role->role }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="user_id" value="{{ $users->id }}">

                    <div class="form-group row mb-4">
                        <label for="shippingMode" class="col-form-label col-lg-2">Address Options</label>
                        <div class="col-lg-10">
                                 <!-- Nav tabs -->
                                 <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#shippingAddress" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Shipping Address</span> 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#billingAddress" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-file-invoice-dollar"></i></span>
                                            <span class="d-none d-sm-block">Billing Address</span> 
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="shippingAddress" role="tabpanel">
                                        <p class="mb-0">

                                            <div class="form-group row mb-4">
                                                <label for="streetName_s" class="col-form-label col-lg-2">Street Name</label>
                                                <div class="col-lg-10">
                                                    <input  name="streetName_s" id="streetName_s" type="text" class="form-control" value="{{ (is_null($users->shipping_address)) ? '' : $users->shippingAddress->street_name }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="streetNumber_s" class="col-form-label col-lg-2">Street Number</label>
                                                <div class="col-lg-10">
                                                    <input  name="streetNumber_s" id="streetNumber_s" type="text" class="form-control" value="{{ (is_null($users->shipping_address)) ? '' : $users->shippingAddress->street_number }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="city_s" class="col-form-label col-lg-2">City</label>
                                                <div class="col-lg-10">
                                                    <input  name="city_s" id="city_s" type="text" class="form-control" value="{{ (is_null($users->shipping_address)) ? '' : $users->shippingAddress->city }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="state_s" class="col-form-label col-lg-2">State</label>
                                                <div class="col-lg-10">
                                                    <input  name="state_s" id="state_s" type="text" class="form-control" value="{{ (is_null($users->shipping_address)) ? '' : $users->shippingAddress->state }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="country_s" class="col-form-label col-lg-2">Country</label>
                                                <div class="col-lg-10">
                                                    <input  name="country_s" id="country_s" type="text" class="form-control" value="{{ (is_null($users->shipping_address)) ? '' : $users->shippingAddress->country }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="postcode_s" class="col-form-label col-lg-2">Poste Code</label>
                                                <div class="col-lg-10">
                                                    <input  name="postcode_s" id="postcode_s" type="text" class="form-control" value="{{ (is_null($users->shipping_address)) ? '' : $users->shippingAddress->post_code }}"  required>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="billingAddress" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="form-group row mb-4">
                                                <label for="streetName_b" class="col-form-label col-lg-2">Street Name</label>
                                                <div class="col-lg-10">
                                                    <input  name="streetName_b" id="streetName_b" type="text" class="form-control" value="{{ (is_null($users->billing_address)) ? '' : $users->billingAddress->street_name }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="streetNumber_b" class="col-form-label col-lg-2">Street Number</label>
                                                <div class="col-lg-10">
                                                    <input  name="streetNumber_b" id="streetNumber_b" type="text" class="form-control" value="{{ (is_null($users->billing_address)) ? '' : $users->billingAddress->street_number }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="city_b" class="col-form-label col-lg-2">City</label>
                                                <div class="col-lg-10">
                                                    <input  name="city_b" id="city_b" type="text" class="form-control" value="{{ (is_null($users->billing_address)) ? '' : $users->billingAddress->city }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="state_b" class="col-form-label col-lg-2">State</label>
                                                <div class="col-lg-10">
                                                    <input  name="state_b" id="state_b" type="text" class="form-control" value="{{ (is_null($users->billing_address)) ? '' : $users->billingAddress->state }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="country_b" class="col-form-label col-lg-2">Country</label>
                                                <div class="col-lg-10">
                                                    <input  name="country_b" id="country_b" type="text" class="form-control" value="{{ (is_null($users->billing_address)) ? '' : $users->billingAddress->country }}"  required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="postcode_b" class="col-form-label col-lg-2">Poste Code</label>
                                                <div class="col-lg-10">
                                                    <input  name="postcode_b" id="postcode_b" type="text" class="form-control" value="{{ (is_null($users->billing_address)) ? '' : $users->billingAddress->post_code }}"  required>
                                                </div>
                                            </div>
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
 


                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>

@endsection

















@section('script')

<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js')}}"></script>

    <script>
        Dropzone.options.mydropzone = {
            maxFiles : 1,
            acceptedFiles: 'image/*',
            init: function(){
                this.on('success',function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0 ){
                        console.log('ok');
                        location.reload();
                    }
                });
            },
        
        };
    </script>

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
        @endif
    </script>


    
    
@endsection

