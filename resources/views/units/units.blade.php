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
                
               <form action="{{ route('units') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 col-xl-5 col-sm-5">
                        <input class="form-control" type="text" value="" id="add_unit_name" name="add_unit_name" placeholder="Enter a Unit Name">
                    </div>
                    <div class="col-md-5 col-xl-5 col-sm-5">
                        <input class="form-control" type="text" value="" id="add_unit_code" name="add_unit_code" placeholder="Enter a Unit Code">
                    </div>
                    <div class="col-md-2 col-xl-2 col-sm-12">

                        <button type="submit" class="btn btn-success waves-effect waves-light btn-block">
                            <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Add Unit
                        </button>
                    </div>
                </div>
               </form>
                
            </div>
        </div>

        <div class="card bg-light text-white-50">
            <div class="card-body">
                
               <form action="{{ route('search-units') }}" method="GET">
                @csrf
                <div class="form-group row">
                    <div class="col-md-5 col-xl-5 col-sm-5">
                        <input class="form-control" type="text"name="unit_name_search" id="unit_name_search" placeholder="Search for Unit">
                    </div>
             
                    <div class="col-md-2 col-xl-2 col-sm-12">

                        <button type="submit" class="btn btn-success waves-effect waves-light btn-block">
                            <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Search Unit
                        </button>
                    </div>
                </div>
               </form>
                
            </div>
        </div>
       </div>
   </div>

   <div class="row">
       @forelse ($units as $unit)
       <div class="col-lg-4">
        <div class="card bg-info text-white-50">
            <div class="card-body">
                <span class="button-spans">
                    <span class="span-edit" data-unit-id="{{ $unit->id }}" data-unit-name="{{ $unit->unit_name }}" data-unit-code="{{ $unit->unit_code }}">
                        <i class="mdi mdi-comment-edit text-light"></i>
                    </span>
                    <span class="span-delete" data-unit-id="{{ $unit->id }}">
                        <i class="mdi mdi-delete text-light"></i></span>
                        <form action="{{ route('units') }}" method="GET">
                           @csrf
                           @method('DELETE')
                           <input type="hidden" name="">
                        </form>
                    </span>
                <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-alert-circle-outline mr-3"></i>Unit Name : {{ $unit->unit_name }}</h5>
                <p class="card-text">Unit Code : {{ $unit->unit_code }}</p>
            </div>
        </div>
    </div>
    @empty
    <p>No Unit Found !</p>
    @endforelse     
   </div>
   <div class="row justify-content-center align-items-center">
       {{ ($pagState) ? $units->links() : '' }}
   </div>


   {{-- modal for update unit --}}
    <div id="edit-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel">Update Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="container">
                       <form action="{{ route('units') }}" method="POST">
                           @csrf
                           @method('PUT')
                           <div class="row mb-3">
                            <label for="unit_name_modal">Unit Name:</label>
                            <input  class="form-control" type="text" id="unit_name_modal" name="unit_name_modal">
                        </div>
                        <div class="row mb-3">
                            <label for="unit_code_modal">Unit Code:</label>
                            <input  class="form-control" type="text" id="unit_code_modal" name="unit_code_modal">
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
                       <form action="{{ route('units') }}" method="POST">
                           @csrf
                           @method('DELETE')
                        <p>Do you want really delete this Unit ?</p>
                        <div class="row">
                            <input type="hidden" name="unit_id_delete" id="unit_id_delete">
                            <button type="submit" class="btn btn-outline-danger btn-block waves-effect waves-light">Delete Unit</button>                        
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
                        var $editId  = $('#unit_id_modal');


                        $editButton.on('click',function(e){
                            e.preventDefault();
                            var unitid   = $(this).data('unit-id'); 
                            var unitName = $(this).data('unit-name');
                            var unitCode = $(this).data('unit-code');
                            console.log(unitid+' '+unitName+' '+unitCode);

                            $('#unit_name_modal').val(unitName);
                            $('#unit_code_modal').val(unitCode);
                            $('#unit_id_modal').val(unitid);
                            $editModal.modal('show');

                        });

                        var $deleteModal = $('#delete-modal');
                        var $deleteId  = $('#unit_id_delete');

                        $deleteButton.on('click',function(e){
                            e.preventDefault();
                            var unitid = $(this).data('unit-id'); 
                            $deleteId.val(unitid);
                            $deleteModal.modal('show');
                        });
                    });
                </script>
                        <!-- Plugin Js-->
                        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

                        <script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>
                  
                @endsection