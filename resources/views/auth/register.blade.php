@extends('layouts.master-without-nav')

@section('title')
Register
@endsection

@section('body')
<body>
@endsection

@section('content')

        <div class="home-btn d-none d-sm-block">
            <a href="{{url('index')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free account now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="{{url('index')}}">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form method="POST" class="form-horizontal mt-4" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="useremail" name="email" required placeholder="Enter email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label for="username">First Name</label>
                                            <input type="text" class="form-control @error('fname') is-invalid @enderror" value="{{old('fname')}}" required name="fname" id="username" placeholder="Enter First Name">
                                            @error('fname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Last Name</label>
                                            <input type="text" class="form-control @error('lname') is-invalid @enderror" value="{{old('lname')}}" required name="lname" id="username" placeholder="Enter Last Name">
                                            @error('lname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
    
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="userpassword" placeholder="Enter password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <input id="password-confirm" type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required placeholder="Enter password">
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile">Mobile Phone</label>
                                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" value="{{old('mobile')}}" required name="mobile" id="mobile" placeholder="Enter Mobile">
                                            @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
                                        </div>
    
                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to our platform <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
    
                                    </form>
    
                                </div>
                            </div>
    
                        </div>
    
                        <div class="mt-5 text-center">
                            <p>Already have an account ? <a href="{{url('login')}}" class="font-weight-medium text-primary"> Login </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Developped with <i class="mdi mdi-heart text-danger"></i> by Eng Wassim</p>
                        </div>
    
    
                    </div>
                </div>
            </div>
        </div>

@endsection